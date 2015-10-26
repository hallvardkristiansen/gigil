    func drawMonthIndicator() {
        let degreePerDay = Double(360) / Double(366)
        var endAngle = CGFloat(-90) - CGFloat(degreePerDay * 11) + 0.5
        for (index, _) in daysInMonths.enumerate() {
            let endindex = index + 1 < daysInMonths.count ? index + 1 : 0
            let v1 = monthVectors[index]
            let v2 = monthVectors[endindex]
            let angle = atan2(v2.dy, v2.dx) - atan2(v1.dy, v1.dx)
            var deg = angle * CGFloat(180.0 / π)
            if deg < 0 { deg += 360.0 }
            
            let startAngle = endAngle + deg + 0.5
        
            let radius = CGFloat(planetRadius - 4)
            let arcCenter = NSPoint(x: offCenter[0], y: offCenter[1])
            let path = NSBezierPath()
            path.appendBezierPathWithArcWithCenter(arcCenter, radius: radius, startAngle: startAngle, endAngle: endAngle)
            path.lineWidth = CGFloat(2)
            if ((index + 1) == thismonth) {
                activeColor.set()
            } else if ((index + 1) > thismonth) {
                disabledColor.set()
            } else {
                inactiveColor.set()
            }
            path.stroke()
            endAngle = startAngle - 0.5
        }
    }
