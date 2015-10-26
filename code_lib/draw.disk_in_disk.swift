    func drawSun() {
        let diameter = CGFloat(lunarRadius * 2.0)
        let diskOffset = diameter - CGFloat(20.0)
        let adjacent = diskOffset / 2.0
        let angle = acos(adjacent / CGFloat(lunarRadius))
        let angleDeg = angle * CGFloat(180.0 / π)
        let arcCenter1 = CGPoint(x: offCenter[0], y: offCenter[1])
        let arcCenter2 = CGPoint(x: CGFloat(offCenter[0]), y: CGFloat(offCenter[1]) - diskOffset)
        let startAngleOuter:CGFloat = 270.0 + angleDeg
        let endAngleOuter:CGFloat = 270.0 - angleDeg
        
        let startAngleInner:CGFloat = 90.0 + angleDeg
        let endAngleInner:CGFloat = 90.0 - angleDeg
        
        let disk = NSBezierPath()
        disk.appendBezierPathWithArcWithCenter(arcCenter1, radius: CGFloat(lunarRadius), startAngle: startAngleOuter, endAngle: endAngleOuter, clockwise: true)
        disk.appendBezierPathWithArcWithCenter(arcCenter2, radius: CGFloat(lunarRadius), startAngle: startAngleInner, endAngle: endAngleInner, clockwise: true)
        disk.closePath()
        
        activeColor.set()
        disk.fill()
    }
