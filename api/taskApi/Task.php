<?php

namespace Api\TaskApi;

class Tasks{
    private $conn;
    public function __construct($dbConnection)
    {
        $this->conn = $dbConnection;
    }

    //get all Tasks
    public function getAllTasks(){
        $result = $this->conn->query("SELECT * FROM tasks");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    //get single Tasks
    public function getTask($id){
        $id = intval($id);
        $query = "SELECT * FROM tasks WHERE id = $id";
        $result = $this->conn->query($query);
        return $result->fetch_assoc();
    }

    //create a new tasks
public function createTask($data){
    $title = $data['title'];
    $description = $data['description'] ?? "";
    $priority = $data['priority'] ?? "low";

    $query = "INSERT INTO tasks(title, description, priority)
    VALUES('$title', '$description', '$priority')";

    if($this->conn->query($query)){
        return ["message" => "Task created successfully."];
    }
    return ["error" => "Failed to create task."];
}

//Update a task
public function updateTask($id, $data){
    $id = intval($id);
    $result = $this->conn->query("SELECT * FROM tasks WHERE id = $id");

    if($result->num_rows === 0){
        http_response_code(404);
        return ["error" => "Task not found."];
    }

    $existingTask = $result->fetch_assoc();

    $title = isset($data['title']) ? $data['title'] : $existingTask['title'];
}



}



?>