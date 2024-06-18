<?php
$servername = "localhost";
$database = "db_mahasiswa";
$username = "root";
$password = "";
//  melakukan koneksi databse
$con = mysqli_connect($servername, $username, $password, $database);
//  cek koneksi
if ($database !='' && !$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Class xquery untuk memudahkan query database
Class xquery{
    
    public $nama_table;
    function __construct($nama_table) {
        $this->nama_table = $nama_table;
    }

    // Mengambil semua data dari table
    public function get()
    {
        global $con;
        $sql = mysqli_query($con,"SELECT * FROM ".$this->nama_table);
        if(!$sql){
            return "Table Tidak Temukan";
        }
        $data = array();
        while($row = mysqli_fetch_assoc($sql)){
            array_push($data,$row);
        }
        return $data;
    }

    // Mengambil data berdasarkan kondisi
    public function where($where,$orderby=false)
    {
        global $con;
        $q = "";
        $nu = 0;
        foreach($where as $k=>$w){
            if($nu == 0){
                $q = $q." WHERE ".$k."='".$w."'";
            }else{
                $q = $q." AND ".$k."='".$w."'";
            }
            $nu++;
        }
        if($orderby){
            $q = $q." ORDER BY ".array_key_first($orderby)." ".$orderby[array_key_first($orderby)];
        }
        $sql = mysqli_query($con,"SELECT * FROM ".$this->nama_table.$q);
        if(!$sql){
            return "Table Tidak Temukan";
        }
        $data = array();
        while($row = mysqli_fetch_assoc($sql)){
            array_push($data,$row);
        }
        return $data;
    }

    // Melakukan query
    public function query($query)
    {
        global $con;
        $sql = mysqli_query($con,$query);
        if(!$sql){
            return "Table Tidak Temukan";
        }
        $data = array();
        while($row = mysqli_fetch_assoc($sql)){
            array_push($data,$row);
        }
        return $data;
    }

    // Menginput data ke table
    public function insert($data)
    {
        global $con;
        $field=array();
        $value =array();
        foreach($data as $n=>$d){
            array_push($field,$n);
            array_push($value,$d == ''? '0' : "'".$d."'");
        }
        $value = implode(', ', $value);
        $field = implode(', ', $field);
        $sql = "INSERT INTO ".$this->nama_table." (".$field.") VALUES (".$value.")";
        if ($con->query($sql)) {
            $data = $this->where(["id"=>$con->insert_id]);
            return $data[0];
        } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    }

    // Update data 
    public function update($data,$id)
    {
        global $con;
        $value =array();
        foreach($data as $n=>$d){
            array_push($value,$d == ''? $n.'=0' : $n."='".$d."'");
        }
        $value = implode(', ', $value);
        $sql = "UPDATE ".$this->nama_table."  SET ".$value." WHERE ".array_key_first($id)." = ".$id[array_key_first($id)];

        if ($con->query($sql)) {
            $data = $this->where([array_key_first($id)=>$id[array_key_first($id)]]);
            return $data;
        } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    }

    public function delete($id)
    {
        global $con;
        $sql = "DELETE FROM ".$this->nama_table." WHERE ".array_key_first($id)." = ".$id[array_key_first($id)];
        if ($con->query($sql)) {
            return true;
        } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    }

}

?>

