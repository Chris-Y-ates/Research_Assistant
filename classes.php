<?php

require_once 'Console/Table.php'; //package to print formatted table with lines

//class for creating table

class Table {

    //constructor function to intialise properties

    public function __construct($csvFile,$option,$tbl='undefined',
                                    $country='undefined',$line='undefined'){
        $this->csvFile = $csvFile; //location of CSV File
        $this->option = $option; //which service the user selected [1/2/3]
        $this->country = $country; //which country code the user chose
        $this->line = $line; //initialise property to assign to each csv line
        $this->tbl = $tbl; //initialise property which will return the table
    }

    // SET THE TABLE HEADERS

    public function setHeads(){ 

        if ($this->option != 3){
            //converts first line of csv file to iterable array
            $headerArray = preg_split("/\s*,\s*/",$this->csvFile[0]);
            
            return $this->tbl->setHeaders( //set headings as per first csv line
                array($headerArray[0], $headerArray[1],$headerArray[2],
                $headerArray[3])
            );
        } elseif($this->option == 3){
            //bespoke headings to show only number of services for specific country
            return $this->tbl->setHeaders(
                array('Country', 'No. of Services')
            );
        }
    }

    // ALL DATA FOR ALL COUNTRIES

    public function option_one(){
        //loops through all csv lines except the first one (the headings line)
        for($x = 1; $x < count($this->csvFile); $x++) {
            //converts each csv line to iterable array
            $lineArray = preg_split("/\s*,\s*/",$this->csvFile[$x]);
            //sets index positions to table rows
            $this->tbl->addRow(array($lineArray[0],$lineArray[1],
                        $lineArray[2], strtoupper($lineArray[3])));                             
            }
        //returns the table to be displayed on the console
        return $this->tbl->getTable();      
    }

    //ALL DATA FOR SPECIFIC COUNTRY

    public function option_two(){
        //loops through all csv lines except the first one (the headings line)
        for($x = 1; $x < count($this->csvFile); $x++) {
            //converts each csv line to iterable array
            $lineArray = preg_split("/\s*,\s*/",$this->csvFile[$x]);
            $lastIndex = end($lineArray);
            $lastIndex = trim($lastIndex);
            //if the user input for country matches the particular csv entry/line
            //then that row is added to the table to be displayed
            if ($this->country == strtoupper($lastIndex)
                || $this->country == strtolower($lastIndex)){

                    $this->tbl->addRow(array($lineArray[0],$lineArray[1],
                                $lineArray[2], strtoupper($lineArray[3])));
            }
        }
        //returns the table to be displayed on the console
        return $this->tbl->getTable();
    }

    // SERVICES FOR SPECIFIC COUNTRIES ONLY

    public function option_three(){

        $numServices = []; //initialise empty array for matching elements
        
        for($x = 1; $x < count($this->csvFile); $x++) {

            //loop through to find lines where the country code matches
            //and if they do include them in the empty numServices array
            $lineArray = preg_split("/\s*,\s*/",$this->csvFile[$x]);
            $lastIndex = end($lineArray);
            $lastIndex = trim($lastIndex);
            $indexTwo = $lineArray[2];

            if ($this->country == strtoupper($lastIndex)
                || $this->country == strtolower($lastIndex)){

                    array_push($numServices, $indexTwo);
            }            
        }
    
        //count unique elements only in the array using the array_unique function
        $totalServices = count(array_unique($numServices));
        $this->tbl->addRow(array($this->country,$totalServices));

        //returns the number of unique services and the country in tabular format
        return $this->tbl->getTable();  
    }
}
?>
