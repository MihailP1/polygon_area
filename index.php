

<!DOCTYPE html>
<html lang="en">
 
<head>
 
	<meta charset="UTF-8">
	<title>Shape calculator</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="shortcut icon" href="logo.png" type="image/png">
		
 
</head>
 
<body>
    <p>Введите координаты через пробел (x y)</p>
    <form action="index.php" method="POST">
        <input type="text" placeholder="first apex" name="firstApex">
        <input type="text" placeholder="second apex" name="secondApex">
        <input type="text" placeholder="third apex" name="thirdApex">
        <button type="submit">рассчитать</button>
    </form>
    <div>
        <?php 
        
        
        abstract class Polygon 
        {
            protected array $apexes;
            function __construct(array $apexes) {
                $this->apexes = $apexes;
                
            }

            protected function getArea() {
                $apexCount = $this->getApexCount();
                //s = 1/2 * |x1y2 + x2y3 + ... + xn-1yn + xny1 - x2y1 - x3y2 - ... - xnyn-1 - x1yn|
                
                $x = $this->getApexes()[0];
                $y = $this->getApexes()[1];
                $expression = 0;
                for ($n = 0; $n < $apexCount - 1; $n++) {
                    $expression += $x[$n]*$y[$n+1];
                }
                $expression += $x[$apexCount-1]*$y[0];
                for($n = 1; $n < $apexCount; $n++) {
                    $expression -= $x[$n]*$y[$n-1];
                }
                $expression -= $x[0]*$y[$apexCount-1];
                $expression = abs($expression);
                $expression *= 0.5;
                return $expression;
                
            }

            protected function getPerimeter() {
                //AB = √(xb - xa)2 + (yb - ya)2
                $apexCount = $this->getApexCount();
                $x = $this->getApexes()[0];
                $y = $this->getApexes()[1];
                $perimeter = 0;
                for($i = 0; $i < $apexCount-1; $i++) {
                    $perimeter += sqrt(pow($x[$i + 1] - $x[$i], 2) + pow($y[$i + 1] - $y[$i], 2));
                }
                $perimeter += sqrt(pow($x[0] - $x[$apexCount-1], 2) + pow($y[0] - $y[$apexCount-1], 2));
                return $perimeter;

            }

            protected function getApexCount() {
                return count($this->apexes);
            }

        }
        
        
        class Triangle extends Polygon 
        {
            public function getApexes() {
                  
                $xApexes = array();
                $yApexes = array();
                $apexes = $this->apexes;
                if(count($apexes) === 3) {
                    for($i = 0; $i < 3; $i++) {
                        $apex = array_slice($apexes, $i, 1);
                        
                        $apex = explode(" ", $apex[array_key_first($apex)]);
                        
                        if(count($apex) == 2) {
                            array_push($xApexes, (int)$apex[0]);
                            array_push($yApexes, (int)$apex[1]);
                        } else {
                            array_push($xApexes, 0);
                            array_push($yApexes, 0);
                        }
                    }

                    $xyApexes[0] = $xApexes;;
                    $xyApexes[1] = $yApexes;;
                    
                    return $xyApexes;
                } else {
                    return array(0 => "0 0", 1 => "0 0", 2 => "0 0");
                }
                
            }


            public function getArea() {
                
                if(isset($this->apexes)){
                    $area = parent::getArea();
                    return $area;
                }
            }


            public function getPerimeter() {
                if(isset($this->apexes)){
                    $perimeter = parent::getPerimeter();
                    return $perimeter;
                }
            }
        }

        $triangle = new Triangle($_POST);

        
        echo "Площадь: {$triangle->getArea()}";
          
        ?>
    </div>
    <div>
        <?php
        echo "Периметр: {$triangle->getPerimeter()}";
        ?>
    </div>
	
	
</body>
</html>