

<!DOCTYPE html>
<html lang="en">
 
<head>
 
	<meta charset="UTF-8">
	<title>Shape calculator</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="shortcut icon" href="logo.png" type="image/png">
	<link rel="stylesheet" href="index.css">
	
	
 
</head>
 
<body>
    <p>Введите координаты через пробел</p>
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
            abstract protected function getSquare();
            abstract protected function getPerimeter();
            protected function getApexCount() {
                return count($this->apexes);
            }

        }
        
        
        class Triangle extends Polygon 
        {
           public function setApexes() {
               $this->firstApex = $this->apexes["firstApex"];
               $this->secondApex = $this->apexes["secondApex"];
               $this->thirdApex = $this->apexes["thirdApex"];
           }
           public function getSquare() {
                $this->setApexes();
                return null;
           }
           public function getPerimeter() {
               return null;
           }
        }

        $triangle = new Triangle($_POST);

        
        echo $triangle->getSquare();
        
        ?>
    </div>
	
	
</body>
</html>