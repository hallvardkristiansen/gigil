    func setSunriseSet(lat: Double, long: Double) {
        let lngHour = long / 15.0
        let dayOfYear = Double(dayofyear)
        let zenith = 96.0
        let localOffset = 1.0
        let rise = dayOfYear + ((6.0 - lngHour) / 24.0)
        let riseMeanAnomaly = (0.9856 * rise) - 3.289
        let riseSunTrueLong = riseMeanAnomaly + (1.916 * sin(riseMeanAnomaly)) + (0.020 * sin(2 * riseMeanAnomaly)) + 282.634
        //NOTE: L potentially needs to be adjusted into the range [0,360) by adding/subtracting 360
        var riseRightAscension = atan(0.91764 * tan(riseSunTrueLong))
        //NOTE: RA potentially needs to be adjusted into the range [0,360) by adding/subtracting 360
        let riseLquadrant  = (floor(riseSunTrueLong/90)) * 90
        let riseRAquadrant = (floor(riseRightAscension/90)) * 90
        riseRightAscension = riseRightAscension + (riseLquadrant - riseRAquadrant)
        riseRightAscension = riseRightAscension / 15
        let riseSinDec = 0.39782 * sin(riseSunTrueLong)
        let riseCosDec = cos(asin(riseSinDec))
        let riseCosH = (cos(zenith) - (riseSinDec * sin(lat))) / (riseCosDec * cos(lat))
        if (riseCosH >  1) {
        //the sun never rises on this location (on the specified date)
        }
        if (riseCosH < -1) {
        //the sun never sets on this location (on the specified date)
        }
        var riseHours = 360 - acos(riseCosH)
        riseHours = riseHours / 15
        let sunrise = riseHours + riseRightAscension - (0.06571 * rise) - 6.622
        let UTrise = sunrise - lngHour
        //NOTE: UT potentially needs to be adjusted into the range [0,24) by adding/subtracting 24
        currentSunRise = UTrise + localOffset
        currentSunSet = currentSunRise + dayLength
        debugText(String(currentSunRise), yoffset: 0)
    }
