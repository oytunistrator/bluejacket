<?php
class Profile
{
    /**
     * Stores details about the last profiled method
     */
    private $details;

    public function __construct() {}

    /**
     * @param classname string
     * @param methodname string
     * @param methodargs array
     * @param invocations int The number of times to call the method
     * @return float average invocation duration in seconds
     */
    public function profile($classname, $methodname, $methodargs, $invocations = 1) {
        if(class_exists($classname) != TRUE) {
            throw new Exception("{$classname} doesn't exist");
        }

        $method = new ReflectionMethod($classname, $methodname);

        $instance = NULL;
        if(!$method->isStatic()){
            $class = new ReflectionClass($classname);
            $instance = $class->newInstance();
        }

        $durations = array();
        for($i = 0; $i < $invocations; $i++) {
            $start = microtime(true);
            $method->invokeArgs($instance, $methodargs);
            $durations[] = microtime(true) - $start;
        }

        $duration["total"] = round(array_sum($durations), 4);
        $duration["average"] = round($duration["total"] / count($durations), 4);
        $duration["worst"] = round(max($durations), 4);

        $this->details = array(  "class" => $classname,
                                "method" => $methodname,
                                "arguments" => $methodargs,
                                "duration" => $duration,
                                "invocations" => $invocations);

        return $duration["average"];
    }

    /**
     * @return string
     */
    private function invokedMethod() {
        return "{$this->details["class"]}::{$this->details["method"]}(" .
             join(", ", $this->details["arguments"]) . ")";
    }

    /**
     * Prints out details about the last profiled method
     */
    public function printDetails() {
        $methodString = $this->invokedMethod();
        $numInvoked = $this->details["invocations"];

        if($numInvoked == 1) {
            echo "{$methodString} took {$this->details["duration"]["average"]}s\n";
        }

        else {
            echo "{$methodString} was invoked {$numInvoked} times\n";
            echo "Total duration:   {$this->details["duration"]["total"]}s\n";
            echo "Average duration: {$this->details["duration"]["average"]}s\n";
            echo "Worst duration:   {$this->details["duration"]["worst"]}s\n";
        }
    }
}

?>
