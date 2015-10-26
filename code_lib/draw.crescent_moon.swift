    func drawCrescentDir(dir: String, stage: CGFloat, fillColor: NSColor) {
        var curvatureState = (stage % 0.25) * 2.5 // look closer at this math
        let crescentCurve = abs(M_PI_2 * Double(curvatureState))
        let angle = CGFloat(M_PI_2 * crescentCurve)
        let arcCenter1 = CGPoint(x: offCenter[0], y: offCenter[1])
        let crescent = NSBezierPath()
        var angleDeg = angle * CGFloat(180.0 / π)
        var goClockwiseOuter = true
        var goClockwiseInner = false
        var arcCenter2 = CGPoint(x: CGFloat(offCenter[0]) - CGFloat(lunarRadius) * abs(tan(angle)), y: CGFloat(offCenter[1]))
        let startAngleOuter:CGFloat = 90.0
        let endAngleOuter:CGFloat = 270.0
        
        if (dir == "left") {
            curvatureState = 1 - curvatureState
            arcCenter2 = CGPoint(x: CGFloat(offCenter[0]) + CGFloat(lunarRadius) * abs(tan(angle)), y: CGFloat(offCenter[1]))
            angleDeg = -angleDeg
            goClockwiseOuter = false
            goClockwiseInner = true
        }

        let startAngleInner = endAngleOuter + angleDeg
        let endAngleInner = startAngleOuter - angleDeg
        
        crescent.appendBezierPathWithArcWithCenter(arcCenter1, radius: CGFloat(lunarRadius), startAngle: startAngleOuter, endAngle: endAngleOuter, clockwise: goClockwiseOuter)
        crescent.appendBezierPathWithArcWithCenter(arcCenter2, radius: CGFloat(Float(lunarRadius) / cosf(Float(angle))), startAngle: startAngleInner, endAngle: endAngleInner, clockwise: goClockwiseInner)
        crescent.closePath()
        
        fillColor.set()
        crescent.fill()
    }
    func drawCrescent(var stage: CGFloat) {
        let disk = NSBezierPath(ovalInRect: NSMakeRect(CGFloat(offCenter[0] - lunarRadius), CGFloat(offCenter[1] - lunarRadius), CGFloat(lunarRadius * 2), CGFloat(lunarRadius * 2)))
        
        if (stage == 0.0) {
            inactiveColor.set()
            disk.fill()
        } else if (stage == 0.5) {
            disabledColor.set()
            disk.fill()
        } else {
            if (stage <= 0.25) {
                inactiveColor.set()
                disk.fill()
                drawCrescentDir("right", stage: stage, fillColor: disabledColor)
            } else if (stage > 0.25 && stage < 0.5) {
                disabledColor.set()
                disk.fill()
                stage = 1 - stage
                drawCrescentDir("left", stage: stage, fillColor: inactiveColor)
            } else if (stage > 0.5 && stage < 0.75) {
                disabledColor.set()
                disk.fill()
                drawCrescentDir("right", stage: stage, fillColor: inactiveColor)
            } else if (stage > 0.75) {
                inactiveColor.set()
                disk.fill()
                stage = 1 - stage
                drawCrescentDir("left", stage: stage, fillColor: disabledColor)
            }
        }
    }
    func drawMoon() {
        let lunarCyclesToDate = CGFloat(Double(dayofyear + 5) / lunarCycle) // the 5 is the first full moon of this year(2015)
        let stageOfCurrentCycle = lunarCyclesToDate - round(lunarCyclesToDate) + 0.5  // adding 0.5 to get a range of 0 - 1
        drawCrescent(stageOfCurrentCycle)
    }
