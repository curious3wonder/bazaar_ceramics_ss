<?php
class User {
    public $CustomerID;
    public $UserID;
    public $CustomerGivenName;
    public $CustomerLastName;
    public $CustomerEmail;
    public $CustomerAddress;
    public $CustomerSuburb;
    public $CustomerState;
    public $CustomerPostCode;
    public $CustomerCountry;
    public $CustomerPhoneNumber;
    public $CustomerAccountFlag;
    public $isLoggedIn = false;
	
    function __construct() {
        if (session_id() == "") {
            session_start();
        }
		if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] == true) {
			$this->_initUser();
        }
    } //end __construct
    public function authenticate($user,$pass) {
		if (session_id() == "") {
            session_start();
        }
        $_SESSION['isLoggedIn'] = false;
        $this->isLoggedIn = false;
		
        $mysqli = new mysqli(DBHOST,DBUSER,DBPASS,DB);
        if ($mysqli->connect_errno) {
                error_log("Cannot connect to MySQL: " . $mysqli->connect_error);
                return false;
        }
		$safeUser = $mysqli->real_escape_string($user);
        $incomingPassword = $mysqli->real_escape_string($pass);        
		$query = "SELECT * FROM member WHERE UserID = '{$safeUser}'";
        if (!$result = $mysqli->query($query)) {
            error_log("Cannot retrieve account for {$user}");
            return false;
        }
		// Will be only one row, so no while() loop needed
        $row = $result->fetch_assoc();
        $dbPassword = $row['HashedPassword'];		
		if(!password_verify($incomingPassword, $dbPassword)) {
            error_log("Passwords for {$user} don't match");
            return false;
        }

		$this->CustomerID = $row['CustomerID'];	
		$this->UserID = $row['UserID'];	
		$newQuery = "SELECT * FROM customer INNER JOIN member ON customer.CustomerID={$row['CustomerID']}";
		$result3 = $mysqli->query($newQuery);
		$newRow = $result3->fetch_assoc();
		
        $this->CustomerGivenName = $newRow['CustomerGivenName'];
        $this->CustomerLastName = $newRow['CustomerLastName'];
        $this->CustomerEmail = $newRow['CustomerEmail'];
        $this->CustomerAddress = $newRow['CustomerAddress'];
        $this->CustomerSuburb = $newRow['CustomerSuburb'];
        $this->CustomerState = $newRow['CustomerState'];
        $this->CustomerPostCode = $newRow['CustomerPostCode'];
        $this->CustomerCountry = $newRow['CustomerCountry'];
        $this->CustomerPhoneNumber = $newRow['CustomerPhoneNumber'];
        $this->CustomerAccountFlag = $newRow['CustomerAccountFlag'];
        $this->isLoggedIn = true;
        $this->_setSession();
        return true;
    } //end function authenticate
    private function _setSession() {
        if (session_id() == '') {
            session_start();
        }
        $_SESSION['CustomerID'] = $this->CustomerID;       
		$_SESSION['UserID'] = $this->UserID;
        $_SESSION['CustomerGivenName'] = $this->CustomerGivenName;
        $_SESSION['CustomerLastName'] = $this->CustomerLastName;
        $_SESSION['CustomerEmail'] = $this->CustomerEmail;
        $_SESSION['CustomerAddress'] = $this->CustomerAddress;
        $_SESSION['CustomerSuburb'] = $this->CustomerSuburb;
        $_SESSION['CustomerState'] = $this->CustomerState;
        $_SESSION['CustomerPostCode'] = $this->CustomerPostCode;
        $_SESSION['CustomerCountry'] = $this->CustomerCountry;
        $_SESSION['CustomerPhoneNumber'] = $this->CustomerPhoneNumber;
        $_SESSION['CustomerAccountFlag'] = $this->CustomerAccountFlag;       
		$_SESSION['isLoggedIn'] = $this->isLoggedIn;
    } //end function setSession
    private function _initUser() {
        if (session_id() == '') {
            session_start();
        }
        $this->CustomerID = $_SESSION['CustomerID'];
		$this->UserID = $_SESSION['UserID'];
        $this->CustomerGivenName = $_SESSION['CustomerGivenName'];
        $this->CustomerLastName = $_SESSION['CustomerLastName'];
        $this->CustomerEmail = $_SESSION['CustomerEmail'];
        $this->CustomerAddress = $_SESSION['CustomerAddress'];
        $this->CustomerSuburb = $_SESSION['CustomerSuburb'];
        $this->CustomerState = $_SESSION['CustomerState'];
        $this->CustomerPostCode = $_SESSION['CustomerPostCode'];
        $this->CustomerCountry = $_SESSION['CustomerCountry'];
        $this->CustomerPhoneNumber = $_SESSION['CustomerPhoneNumber'];
        $this->CustomerAccountFlag = $_SESSION['CustomerAccountFlag'];
		$this->isLoggedIn = $_SESSION['isLoggedIn'];
    } //end function initUser
	public function logout() {
        $this->isLoggedIn = false;
        if (session_id() == '') {
            session_start();
        }
        $_SESSION['isLoggedIn'] = false;
        foreach ($_SESSION as $key => $value) {
            $_SESSION[$key] = "";
            unset($_SESSION[$key]);
        }
        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
            $cookieParameters = session_get_cookie_params();
            setcookie(session_name(), '', time() - 28800,
                $cookieParameters['path'],$cookieParameters['domain'],
                $cookieParameters['secure'],$cookieParameters['httponly']
            );
        } //end if
        session_destroy();
    } //end function logout
} //end class User
?>