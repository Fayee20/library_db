<?php 
//get all STUDENT 
function getAllstudent($db) {

    
    $sql = 'Select * FROM student '; 
    $stmt = $db->prepare ($sql); 
    $stmt ->execute(); 
    return $stmt->fetchAll(PDO::FETCH_ASSOC); 
} 

//get STUDENT by id 
//get STUDENT by id 
function getstudent($db, $Id) {

    $sql = 'Select o.bookTitle, o.studentName, o.studentId, o.borrowDate, o.returnDate FROM student o  ';
    $sql .= 'Where o.id = :id';
    $stmt = $db->prepare ($sql);
    $id = (int) $Id;
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC); 

}

//add new STUDENT 
function createstudent($db, $form_data) { 
    //stop at sisni
    $sql = 'Insert into student (bookTitle, studentName, studentId, borrowDate, returnDate)'; 
    $sql .= 'values (:bookTitle, :studentName, :studentId, :borrowDate, :returnDate)';  
    $stmt = $db->prepare ($sql); 
    $stmt->bindParam(':bookTitle', $form_data['bookTitle']);
    $stmt->bindParam(':studentName', ($form_data['studentName']));
    $stmt->bindParam(':studentId', ($form_data['studentId']));
    $stmt->bindParam(':borrowDate', ($form_data['borrowDate']));
    $stmt->bindParam(':returnDate', ($form_data['returnDate']));
    $stmt->execute(); 
    return $db->lastInsertID();
}


//delete STUDENT by id 
function deletestudent($db,$Id) { 

    $sql = ' Delete from student where Id = :Id';
    $stmt = $db->prepare($sql);  
    $Id = (int)$Id; 
    $stmt->bindParam(':Id', $Id, PDO::PARAM_INT); 
    $stmt->execute(); 
} 

//update STUDENT by id 
function updatestudent($db,$form_dat,$Id) { 

    $sql = 'UPDATE student SET bookTitle = :bookTitle, studentName = :studentName, studentId = :studentId, borrowDate = :borrowDate, returnDate = :returnDate'; 
    $sql .=' WHERE id = :id'; 
    $stmt = $db->prepare ($sql); 
    $id = (int)$Id;  
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':bookTitle', $form_dat['bookTitle']);
    $stmt->bindParam(':studentName', ($form_dat['studentName']));
    $stmt->bindParam(':studentId', ($form_dat['studentId']));
    $stmt->bindParam(':borrowDate', ($form_dat['borrowDate']));
    $stmt->bindParam(':returnDate', ($form_dat['returnDate']));
    $stmt->execute();
}