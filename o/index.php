<?php

class Square
{
    public int|float $height;
    public int|float $width;
}

class Circle
{
    public int|float $radius;
}

class Triangle
{
    public int|float $base;
    public int|float $height;
}

class AreaCalculator
{
    public function calculate($shapes)
    {
        $area = [];

        foreach ($shapes as $shape) {
            if ($shape instanceof Square)
                $area[] = $shape->height * $shape->width;
            elseif ($shape instanceof Circle)
                $area[] = pi() + ($shape->radius * $shape->radius);
            elseif ($shape instanceof Triangle)
                $area[] = ($shape->height * $shape->base) / 2;
        }

        return array_sum($area);
    }
}

echo "Prepared for Open Closed principle";