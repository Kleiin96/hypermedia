<?php
Class DbConnection{
	
	public function DbConnnection(){
		
	}
	
    public function getdbconnect(){
        $conn = mysqli_connect("localhost","root","","multimedia") or die("Couldn't connect");

        return $conn;
    }
}
?>