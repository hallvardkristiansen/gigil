    func getDayLengthFromLat(lat: Double) {
        let toRad = π / 180.0
        let latAsRad = lat * toRad
        let const1 = 0.39795
        let const2 = 0.2163108
        let const3 = 0.9671396
        let const4 = 0.00860
        let const5 = 186.0
        let refractionConst = 0.8333
        let hrsInDay = 24.0
        let step1 = Double(dayofyear) - const5
        let step2 = const4 * step1
        let step3 = tan(step2)
        let step4 = const3 * step3
        let step5 = atan(step4)
        let step6 = 2 * step5
        let revolutionAngle = const2 + step6
        let step8 = cos(revolutionAngle)
        let step9 = const1 * step8
        let declinationAngle = asin(step9)
        
        let step10 = sin(refractionConst * toRad)
        let step11 = sin(latAsRad)
        let step12 = sin(declinationAngle)
        let meridian = step10 + step11 * step12
        
        let step13 = cos(latAsRad)
        let step14 = cos(declinationAngle)
        let result3 = step13 * step14
        
        let result4 = meridian / result3
        let step15 = acos(result4)

        dayLength = hrsInDay - (hrsInDay / π) * step15
    }
