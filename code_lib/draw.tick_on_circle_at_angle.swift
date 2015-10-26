    func drawDayTick(thisradius: Double, ticklength: Double, tickstroke: CGFloat, angle: Double, monthIndex: Int, dayIndex: Int) {
        let xm: Double = Double(sin(angle))
        let ym: Double = Double(cos(angle))
        let xstart: Double = offCenter[0]
        let ystart: Double = offCenter[1]
        let xend: Double = center[0] + ((thisradius + ticklength) * xm)
        let yend: Double = center[1] + ((thisradius + ticklength) * ym)
        
        if (dayIndex == 1) {
            monthVectors.insert(CGVector(dx: xend - offCenter[0], dy: yend - offCenter[1]), atIndex: monthIndex)
        }
        
        let bPath: NSBezierPath = NSBezierPath()
        bPath.moveToPoint(NSMakePoint(CGFloat(xstart), CGFloat(ystart)))
        bPath.lineToPoint(NSMakePoint(CGFloat(xend), CGFloat(yend)))
        bPath.lineWidth = tickstroke
        bPath.stroke()
    }
