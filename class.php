<?php
class vignesh
{
	public function Signin($profile_name,$username,$user_type,$password,$email,$user_profile)
	{
		try{
			$status = "1";
			$db = DB();
			$query = $db->prepare("INSERT INTO info (username, password, email, profile_name, user_type, user_profile, profile_status) VALUES (:user,:pass,:email,:profile_name,:user_type,:user_profile,:profile_status)");
			$query->bindParam("user", $username, PDO::PARAM_STR);
            $enc_password = hash('sha256', $password);
			$query->bindParam("pass", $enc_password, PDO::PARAM_STR);
			$query->bindParam("email", $email, PDO::PARAM_STR);
			$query->bindParam("user_type", $user_type, PDO::PARAM_STR);
			$query->bindParam("profile_name", $profile_name, PDO::PARAM_STR);
			$query->bindParam("user_profile", $user_profile, PDO::PARAM_STR);
			$query->bindParam("profile_status", $status, PDO::PARAM_STR);
			if($query->execute() == true){
				return true;
			}else{
				return false;
			}
		} catch(PDOException $e){
			exit($e->getMessage());
		}
	}
	
	public function Login($username, $password)
	{
		try{
			$status = "1";
			$db = DB();
			$query = $db->prepare("SELECT profile_name, username, password, email, user_type, profile_status FROM info WHERE username=:user OR email=:email AND password=:pass AND profile_status=:status");
			$query->bindParam("user", $username, PDO::PARAM_STR);
			$query->bindParam("email", $username, PDO::PARAM_STR);
			$enc_password = hash('sha256', $password);
			$query->bindParam("pass", $enc_password, PDO::PARAM_STR);
			$query->bindParam("status", $status, PDO::PARAM_STR);
			$query->execute();
			if($query->rowCount() > 0){
				while($row = $query->fetch(PDO::FETCH_ASSOC))
				{
					$profile_name = $row['profile_name'];
					$user_type = $row['user_type'];
					$user = $row['username']; 
					if($user_type == "Teacher"){
						session_start();
						setcookie($user, $password, time() + (1 * 365 * 24 * 60 * 60), "/");
						$_SESSION['username'] = $user;
						$_SESSION['user_type'] = "Teacher";
						$_SESSION['profile_name'] = $profile_name;
						header("Location: teacher_dashboard.php");
					}elseif($user_type == "Student"){
						session_start();
						setcookie($user, $password, time() + (1 * 180 * 24 * 60 * 60), "/");
						$_SESSION['username'] = $user;
						$_SESSION['user_type'] = "Student";
						$_SESSION['profile_name'] = $profile_name;
						header("Location: student_dashboard.php");
					}elseif($user_type == "Admin"){
						session_start();
						setcookie($user, $password, time() + (1 * 180 * 24 * 60 * 60), "/");
						$_SESSION['username'] = $user;
						$_SESSION['user_type'] = "Admin";
						$_SESSION['profile_name'] = $profile_name;
						header("Location: admin_dashboard.php");
					}
					
				}
				
			}else{
				return false;
			}
		} catch(PDOException $e){
			exit($e->getMessage());
		}
		
		
	}
	
	public function User_Details($username)
	{
		try{
			$db = DB();
			$query = $db->prepare("SELECT i_id, profile_name, email, user_type, user_profile, profile_status FROM info WHERE username=:user");
			
			$query->bindParam("user", $username, PDO::PARAM_STR);
			$query->execute();
			if($query->rowCount() > 0){
				return $query->fetch(PDO::FETCH_OBJ);
			}else{
				return false;
			}
		} catch (PDOException $e){
			exit($e->getMessage());
		}
	}
	public function Teacher_Insert($Name,$Dob,$Joiningdate,$Gender,$Qualification,$Email,$Phone_no,$Academic,$Department,$Subject)
	{
		try{
			$db = DB();
			$query = $db->prepare("INSERT INTO teacher (Name,Dob,Joiningdate,Gender,Qualification,Email,Phone_no,Academic,Department,Subject) VALUES (:Name,:Dob,:Joiningdate,:Gender,:Qualification,:Email,:Phone_no,:Academic,:Department,:Subject)");
			$query->bindParam("Name", $Name, PDO::PARAM_STR);
			$query->bindParam("Dob", $Dob, PDO::PARAM_STR);
			$query->bindParam("Joiningdate", $Joiningdate, PDO::PARAM_STR);
			$query->bindParam("Gender", $Gender, PDO::PARAM_STR);
			$query->bindParam("Qualification", $Qualification, PDO::PARAM_STR);
			$query->bindParam("Email", $Email, PDO::PARAM_STR);
			$query->bindParam("Phone_no", $Phone_no, PDO::PARAM_STR);
			$query->bindParam("Academic", $Academic, PDO::PARAM_STR);
			$query->bindParam("Department", $Department, PDO::PARAM_STR);
			$query->bindParam("Subject", $Subject, PDO::PARAM_STR);
			if($query->execute() == true){
				return true;
			}else{
				return false;
			}
			
		} catch (PDOException $e) 
		{
			$e->getMessage();
		}
	}
	public function Teacher_Read()
	{
		try{
			$db = DB();
			
			$query = $db->prepare("SELECT t_id, Name, Dob, Joiningdate, Gender, Qualification, Email, Phone_no, Academic, Department, Subject FROM teacher");
			$query->execute();
			if($query->rowCount() > 0)
			{
				return $query;
			}else
			{
				return false;
			}
		} catch(PDOException $e)
		{
			$e->getMessage();
		}
	}
	public function Teacher_Update($t_id,$Name,$Dob,$Joiningdate,$Gender,$Qualification,$Email,$Phone_no,$Academic,$Department,$Subject)
	{
		try{
			$db = DB();
			$query = $db->prepare("UPDATE teacher SET Name=:Name, Dob=:Dob, Joiningdate=:Joiningdate, Gender=:Gender, Qualification=:Qualification, Email=:Email, Phone_no=:Phone_no, Academic=:Academic, Department=:Department, Subject=:Subject WHERE t_id=:t_id");
			$query->bindParam("t_id", $t_id, PDO::PARAM_STR);
			$query->bindParam("Name", $Name, PDO::PARAM_STR);
			$query->bindParam("Dob", $Dob, PDO::PARAM_STR);
			$query->bindParam("Joiningdate", $Joiningdate, PDO::PARAM_STR);
			$query->bindParam("Gender", $Gender, PDO::PARAM_STR);
			$query->bindParam("Qualification", $Qualification, PDO::PARAM_STR);
			$query->bindParam("Email", $Email, PDO::PARAM_STR);
			$query->bindParam("Phone_no", $Phone_no, PDO::PARAM_STR);
			$query->bindParam("Academic", $Academic, PDO::PARAM_STR);
			$query->bindParam("Department", $Department, PDO::PARAM_STR);
			$query->bindParam("Subject", $Subject, PDO::PARAM_STR);
			if($query->execute() == True)
			{
				return True;
			}else{
				return False;
			}
			
		} catch(PDOException $e)
		{
			$e->getMessage();
		}
		
	}
		public function Teacher_delete($id)
	{
		try{
			$db = DB();
			$query = $db->prepare("DELETE FROM teacher WHERE t_id=:t_id");
			$query->bindParam("t_id", $t_id, PDO::PARAM_STR);
			if($query->execute() == true){
				return true;
			}else{
				return false;
			}
			
		} catch(PDOException $e)
		{
			$e->getMessage();
		}
	}
	public function Teacher_Name_Read()
	{
		try{
			$db = DB();
			
			$query = $db->prepare("SELECT Name FROM teacher");
			$query->execute();
			if($query->rowCount() > 0)
			{
				return $query;
			}else
			{
				return false;
			}
		} catch(PDOException $e)
		{
			$e->getMessage();
		}
	}
	public function Class_Teacher_Read()
	{
		try{
			$db = DB();
			
			$query = $db->prepare("SELECT c_id, Name, Academic, Department, Year, Class 
			FROM class WHERE Name='" . $Name . "'
			");
			$query->execute();
			if($query->rowCount() > 0)
			{
				return $query;
			}else
			{
				return false;
			}
		} catch(PDOException $e)
		{
			$e->getMessage();
		}
	}
	public function Student_Insert($Name,$Register_no,$Dob,$Gender,$Email,$Phone_no,$Academic,$Department,$Year,$Class)
	{
		try{
			$db = DB();
			$query = $db->prepare("INSERT INTO student (Name,Register_no,Dob,Gender,Email,Phone_no,Academic,Department,Year,Class) VALUES (:Name,:Register_no,:Dob,:Gender,:Email,:Phone_no,:Academic,:Department,:Year,:Class)");
			$query->bindParam("Name", $Name, PDO::PARAM_STR);
			$query->bindParam("Register_no", $Register_no, PDO::PARAM_STR);
			$query->bindParam("Dob", $Dob, PDO::PARAM_STR);
	        $query->bindParam("Gender", $Gender, PDO::PARAM_STR);
			$query->bindParam("Email", $Email, PDO::PARAM_STR);
			$query->bindParam("Phone_no", $Phone_no, PDO::PARAM_STR);
			$query->bindParam("Academic", $Academic, PDO::PARAM_STR);
			$query->bindParam("Department", $Department, PDO::PARAM_STR);
			$query->bindParam("Year", $Year, PDO::PARAM_STR);
			$query->bindParam("Class", $Class, PDO::PARAM_STR);
			if($query->execute() == true){
				return true;
			}else{
				return false;
			}
			
		} catch (PDOException $e) 
		{
			$e->getMessage();
		}
	}
	public function Student_Read()
	{
		try{
			$db = DB();
			
			$query = $db->prepare("SELECT id, Name, Register_no, Dob, Gender, Email, Phone_no, Academic, Department, Year, Class FROM student");
			$query->execute();
			if($query->rowCount() > 0)
			{
				return $query;
			}else
			{
				return false;
			}
		} catch(PDOException $e)
		{
			$e->getMessage();
		}
	}
	public function Student_Update($id,$Name,$Register_no,$Dob,$Gender,$Email,$Phone_no,$Academic,$Department,$Year,$Class)
	{
		try{
			$db = DB();
			$query = $db->prepare("UPDATE student SET Name=:Name, Register_no=:Register_no, Dob=:Dob, Gender=:Gender, Email=:Email, Phone_no=:Phone_no, Academic=:Academic, Department=:Department, Year=:Year, Class=:Class WHERE id=:id");
			$query->bindParam("id", $id, PDO::PARAM_STR);
	        $query->bindParam("Name", $Name, PDO::PARAM_STR);
			$query->bindParam("Register_no", $Register_no, PDO::PARAM_STR);
			$query->bindParam("Dob", $Dob, PDO::PARAM_STR);
	        $query->bindParam("Gender", $Gender, PDO::PARAM_STR);
			$query->bindParam("Email", $Email, PDO::PARAM_STR);
			$query->bindParam("Phone_no", $Phone_no, PDO::PARAM_STR);
			$query->bindParam("Academic", $Academic, PDO::PARAM_STR);
			$query->bindParam("Department", $Department, PDO::PARAM_STR);
			$query->bindParam("Year", $Year, PDO::PARAM_STR);
			$query->bindParam("Class", $Class, PDO::PARAM_STR);
			if($query->execute() == True)
			{
				return True;
			}else{
				return False;
			}
			
		} catch(PDOException $e)
		{
			$e->getMessage();
		}
		
	}
		public function Student_delete($id)
	{
		try{
			$db = DB();
			$query = $db->prepare("DELETE FROM student WHERE id=:id");
			$query->bindParam("id", $id, PDO::PARAM_STR);
			if($query->execute() == true){
				return true;
			}else{
				return false;
			}
			
		} catch(PDOException $e)
		{
			$e->getMessage();
		}
	}
	public function Department_Insert($Academic,$Department,$Year,$Class)
	{
		try{
			$db = DB();
			$query = $db->prepare("INSERT INTO department (Academic,Department,Year,Class) VALUES (:Academic,:Department,:Year,:Class)");
			$query->bindParam("Academic", $Academic, PDO::PARAM_STR);
			$query->bindParam("Department", $Department, PDO::PARAM_STR);	
			$query->bindParam("Year", $Year, PDO::PARAM_STR);	
			$query->bindParam("Class", $Class, PDO::PARAM_STR);	
			if($query->execute() == true){
				return true;
			}else{
				return false;
			}
			
		} catch (PDOException $e) 
		{
			$e->getMessage();
		}
	}
	public function Department_Read()
	{
		try{
			$db = DB();
			
			$query = $db->prepare("SELECT id, Academic, Department, Year, Class FROM department");
			$query->execute();
			if($query->rowCount() > 0)
			{
				return $query;
			}else
			{
				return false;
			}
		} catch(PDOException $e)
		{
			$e->getMessage();
		}
	}
	public function Department_Update($id,$Academic,$Department,$Year,$Class)
	{
		try{
			$db = DB();
			$query = $db->prepare("UPDATE department SET Academic=:Academic, Department=:Department, Year=:Year, Class=:Class WHERE id=:id");
			$query->bindParam("id", $id, PDO::PARAM_STR);
			$query->bindParam("Academic", $Academic, PDO::PARAM_STR);
			$query->bindParam("Department", $Department, PDO::PARAM_STR);
			$query->bindParam("Year", $Year, PDO::PARAM_STR);
			$query->bindParam("Class", $Class, PDO::PARAM_STR);
			if($query->execute() == True)
			{
				return True;
			}else{
				return False;
			}
			
		} catch(PDOException $e)
		{
			$e->getMessage();
		}
		
	}
		public function Department_delete($id)
	{
		try{
			$db = DB();
			$query = $db->prepare("DELETE FROM department WHERE id=:id");
			$query->bindParam("id", $id, PDO::PARAM_STR);
			if($query->execute() == true){
				return true;
			}else{
				return false;
			}
			
		} catch(PDOException $e)
		{
			$e->getMessage();
		}
	}
    public function Class_Insert($Name,$Academic,$Department,$Year,$Class)
	{
		try{
			$db = DB();
			$query = $db->prepare("INSERT INTO class (Name,Academic,Department,Year,Class) VALUES (:Name, :Academic,:Department,:Year,:Class)");
			$query->bindParam("Name", $Name, PDO::PARAM_STR);
			$query->bindParam("Academic", $Academic, PDO::PARAM_STR);
			$query->bindParam("Department", $Department, PDO::PARAM_STR);	
			$query->bindParam("Year", $Year, PDO::PARAM_STR);	
			$query->bindParam("Class", $Class, PDO::PARAM_STR);	
			if($query->execute() == true){
				return true;
			}else{
				return false;
			}
			
		} catch (PDOException $e) 
		{
			$e->getMessage();
		}
	}

	public function Class_Read()
	{
		try{
			$db = DB();
			
			$query = $db->prepare("SELECT id, Name, Academic, Department, Year, Class FROM class");
			$query->execute();
			if($query->rowCount() > 0)
			{
				return $query;
			}else
			{
				return false;
			}
		} catch(PDOException $e)
		{
			$e->getMessage();
		}
	}
	public function Class_Update($id,$Academic,$Department,$Year,$Class)
	{
		try{
			$db = DB();
			$query = $db->prepare("UPDATE class SET Name=:Name, Academic=:Academic, Department=:Department, Year=:Year, Class=:Class WHERE id=:id");
			$query->bindParam("id", $id, PDO::PARAM_STR);
			$query->bindParam("Name", $Name, PDO::PARAM_STR);
			$query->bindParam("Academic", $Academic, PDO::PARAM_STR);
			$query->bindParam("Department", $Department, PDO::PARAM_STR);
			$query->bindParam("Year", $Year, PDO::PARAM_STR);
			$query->bindParam("Class", $Class, PDO::PARAM_STR);
			if($query->execute() == True)
			{
				return True;
			}else{
				return False;
			}
			
		} catch(PDOException $e)
		{
			$e->getMessage();
		}
		
	}
		public function Class_delete($id)
	{
		try{
			$db = DB();
			$query = $db->prepare("DELETE FROM class WHERE id=:id");
			$query->bindParam("id", $id, PDO::PARAM_STR);
			if($query->execute() == true){
				return true;
			}else{
				return false;
			}
			
		} catch(PDOException $e)
		{
			$e->getMessage();
		}
	}

	public function Form_Insert($Department,$Course,$Year,$Class,$Subject,$Title,$Description,$Assigndate,$Deadlinedate)
	{
		try{
			$db = DB();
			$query = $db->prepare("INSERT INTO assignment (Department,Course,Year,Class,Subject,Title,Description,Assigndate,Deadlinedate) VALUES (:Department,:Course,:Year,:Class,:Subject,:Title,:Description,:Assigndate,:Deadlinedate)");
			$query->bindParam("Department", $Department, PDO::PARAM_STR);
			$query->bindParam("Course", $Course, PDO::PARAM_STR);
			$query->bindParam("Year", $Year, PDO::PARAM_STR);
			$query->bindParam("Class", $Class, PDO::PARAM_STR);
			$query->bindParam("Subject", $Subject, PDO::PARAM_STR);
			$query->bindParam("Title", $Title, PDO::PARAM_STR);
			$query->bindParam("Description", $Description, PDO::PARAM_STR);
			$query->bindParam("Assigndate", $Assigndate, PDO::PARAM_STR);
			$query->bindParam("Deadlinedate", $Deadlinedate, PDO::PARAM_STR);
			if($query->execute() == true){
				return true;
			}else{
				return false;
			}
			
		} catch (PDOException $e) 
		{
			$e->getMessage();
		}
	}
	
	public function Form_Read()
	{
		try{
			$db = DB();
			
			$query = $db->prepare("SELECT a_id, Department, Course, Year, Class, Subject, Title, Description, Assigndate, Deadlinedate FROM assignment");
			$query->execute();
			if($query->rowCount() > 0)
			{
				return $query;
			}else
			{
				return false;
			}
		} catch(PDOException $e)
		{
			$e->getMessage();
		}
	}
	
	public function Form_Update($a_id,$Department,$Course,$Year,$Class,$Subject,$Title,$Description,$Deadlinedate)
	{
		try{
			$db = DB();
			$query = $db->prepare("UPDATE assignment SET Department=:Department, Course=:Course, Year=:Year, Class=:Class, Subject=:Subject, Title=:Title, Description=:Description, Deadlinedate=:Deadlinedate WHERE id=:id");
			$query->bindParam("a_id", $id, PDO::PARAM_STR);
			$query->bindParam("Department", $Department, PDO::PARAM_STR);
			$query->bindParam("Course", $Course, PDO::PARAM_STR);
			$query->bindParam("Year", $Year, PDO::PARAM_STR);
			$query->bindParam("Class", $Class, PDO::PARAM_STR);
			$query->bindParam("Subject", $Subject, PDO::PARAM_STR);
			$query->bindParam("Title", $Title, PDO::PARAM_STR);
			$query->bindParam("Description", $Description, PDO::PARAM_STR);
			$query->bindParam("Deadlinedate", $Deadlinedate, PDO::PARAM_STR);
			if($query->execute() == True)
			{
				return True;
			}else{
				return False;
			}
			
		} catch(PDOException $e)
		{
			$e->getMessage();
		}
		
	}

    	
	public function form_delete($a_id)
	{
		try{
			$db = DB();
			$query = $db->prepare("DELETE FROM assignment WHERE a_id=:a_id");
			$query->bindParam("a_id", $a_id, PDO::PARAM_STR);
			if($query->execute() == true){
				return true;
			}else{
				return false;
			}
			
		} catch(PDOException $e)
		{
			$e->getMessage();
		}
	}
	
    public function Files($file_upload)
	{
		try{
			
			$db = DB();
			$query = $db->prepare("INSERT INTO files (file_upload) VALUES (:file_upload)");
			$query->bindParam("file_upload", $file_upload, PDO::PARAM_STR);
          
			if($query->execute() == true){
				return true;
			}else{
				return false;
			}
		} catch(PDOException $e){
			exit($e->getMessage());
		}
	}
	public function Files_Update($id,$file_upload)
	{
		try{
			$db = DB();
			$query = $db->prepare("UPDATE files SET file_upload=:file_upload, WHERE id=:id");
			$query->bindParam("id", $id, PDO::PARAM_STR);
			$query->bindParam("file_upload", $file_upload, PDO::PARAM_STR);
			if($query->execute() == True)
			{
				return True;
			}else{
				return False;
			}
			
		} catch(PDOException $e)
		{
			$e->getMessage();
		}
		
	}
	public function File_delete($id)
	{
		try{
			$db = DB();
			$query = $db->prepare("DELETE FROM files WHERE id=:id");
			$query->bindParam("id", $id, PDO::PARAM_STR);
			if($query->execute() == true){
				return true;
			}else{
				return false;
			}
			
		} catch(PDOException $e)
		{
			$e->getMessage();
		}
	}
	public function Table_Read()
	{
		try{
			$db = DB();
			$query = $db->prepare("SELECT Department, Course, Year, Class, Subject, Title, Description, Assigndate, Deadlinedate FROM assignment WHERE Department='Engineering' AND Course='Undergraduate' AND Year='2nd Year' AND Class='D' AND Subject='Maths'");
			$query->execute();
			if($query->rowCount() > 0)
			{
				return $query;
			}else
			{
				return false;
			}
		} catch(PDOException $e)
		{
			$e->getMessage();
		}
	}
   
	public function Submit_Assignment()
	{
		try{
			$db = DB();
			$query = $db->prepare("SELECT a.Department, a.Course, a.Year, a.Class, a.Subject, a.Title, a.Description, a.Assigndate, a.Deadlinedate , f.file_upload, r.Comment, r.Mark 			
FROM assignment a
LEFT JOIN files f
  ON a.a_id = f.f_id
  LEFT JOIN remark r
  ON a.a_id = r.r_id
  ");
			$query->execute();
			if($query->rowCount() > 0)
			{
				return $query;
			}else
			{
				return false;
			}
		} catch(PDOException $e)
		{
			$e->getMessage();
		}
	}
	
   public function Teacher_View_Assignment()
	{
		try{
			$db = DB();
			$query = $db->prepare("SELECT i.username, a.Department, a.Course, a.Year, a.Class, a.Subject, a.Title, a.Description, a.Assigndate, a.Deadlinedate , f.file_upload 
			FROM assignment a
            LEFT JOIN files f
            ON a.a_id = f.f_id
			LEFT JOIN info i
            ON a.a_id = i.i_id");
			$query->execute();
			if($query->rowCount() > 0)
			{
				return $query;
			}else
			{
				return false;
			}
		} catch(PDOException $e)
		{
			$e->getMessage();
		}
	}
    public function Teacher_Remark($Comment,$Mark)
	{
		try{
			$db = DB();
			$query = $db->prepare("INSERT INTO remark (Comment, Mark) VALUES (:Comment, :Mark)");
			$query->bindParam("Comment", $Comment, PDO::PARAM_STR);
			$query->bindParam("Mark", $Mark, PDO::PARAM_STR);
			if($query->execute() == true){
				return true;
			}else{
				return false;
			}
			
		} catch (PDOException $e) 
		{
			$e->getMessage();
		}
	}
	public function Teacher_Remark_Read()
	{
		try{
			$db = DB();
			$query = $db->prepare("SELECT  id, Comment, Mark  FROM remark WHERE username='$username'");
			$query->execute();
			if($query->rowCount() > 0)
			{
				return $query;
			}else
			{
				return false;
			}
		} catch(PDOException $e)
		{
			$e->getMessage();
		}
	}
	
}

