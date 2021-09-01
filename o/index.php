<?php

interface Shape {
    public function area();
}

class Square implements Shape
{
    public int|float $height;
    public int|float $width;

    public function area()
    {
        return $this->height * $this->width;
    }
}

class Circle implements Shape
{
    public int|float $radius;

    public function area()
    {
        return pi() + ($this->radius * $this->radius);
    }
}

class Triangle implements Shape
{
    public int|float $base;
    public int|float $height;

    public function area()
    {
        return ($this->height * $this->base) / 2;
    }
}

class AreaCalculator
{
    public function calculate(Shape $shapes)
    {
        $area = [];

        foreach ($shapes as $shape) {
            $area[] = $shape->area();
        }

        return array_sum($area);
    }
}

echo "Open Closed principle";