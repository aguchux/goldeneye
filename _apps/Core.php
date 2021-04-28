<?php

//Write your custome class/methods here
namespace Apps;

use Apps\Template;

class Core extends Model
{


	/** @return exit  */
	public function __construct()
	{
		parent::__construct();
	}


	public function GenPassword($length = 10)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

	public function GenOTP($length = 10)
	{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return strtoupper($randomString);
	}

	public function Monify($amount)
	{
		$Temp = new Template;
		$accid = $Temp->storage("accid");
		$ThisUser = $this->UserInfo($accid);
		$curr = $ThisUser->currency;
		$sign = $this->Symbol2Sign($curr);
		$amount = number_format($amount, 2, ".", ",");
		return "{$sign} " . $amount;
	}


	public function Symbol2Sign($symbol)
	{
		$signs = array(
			"USD"=>"&#36;",
			"EUR"=>"&#8364;",
			"GBP"=>"&#163;",
			"JPY"=>"&#165;",
		);
		return $signs[$symbol];
	}

	public function Sign2Symbol($sign)
	{
		$symbol = array(
			"&#36;"=>"USD",
			"&#8364;"=>"EUR",
			"&#163;"=>"GBP",
			"&#165;"=>"JPY",
		);
		return $symbol[$sign];
	}

	public function Cycle($time_ago)
	{
		$current_time    = time();
		$time_difference = $current_time - $time_ago;
		$seconds         = $time_difference;

		$minutes = round($seconds / 60); // value 60 is seconds
		$hours   = round($seconds / 3600); //value 3600 is 60 minutes * 60 sec
		$days    = round($seconds / 86400); //86400 = 24 * 60 * 60;
		$weeks   = round($seconds / 604800); // 7*24*60*60;
		$months  = round($seconds / 2629440); //((365+365+365+365+366)/5/12)*24*60*60
		$years   = round($seconds / 31553280); //(365+365+365+365+366)/5 * 24 * 60 * 60

		if ($seconds <= 60) {
			return "Just Now";
		} else if ($minutes <= 60) {
			if ($minutes == 1) {
				return "one minute ago";
			} else {
				return "$minutes minutes ago";
			}
		} else if ($hours <= 24) {
			if ($hours == 1) {
				return "an hour ago";
			} else {
				return "$hours hrs ago";
			}
		} else if ($days <= 7) {
			if ($days == 1) {
				return "yesterday";
			} else {
				return "$days days ago";
			}
		} else if ($weeks <= 4.3) {
			if ($weeks == 1) {
				return "a week ago";
			} else {
				return "$weeks weeks ago";
			}
		} else if ($months <= 12) {
			if ($months == 1) {
				return "a month ago";
			} else {
				return "$months months ago";
			}
		} else {
			if ($years == 1) {
				return "one year ago";
			} else {
				return "$years years ago";
			}
		}
	}

	public function seconds($time_from, $time_to)
	{
		$time_difference = $time_to - $time_from;
		return $time_difference;
	}


	public function ROI($invid)
	{
		$InvestmentInfo = $this->InvestmentInfo($invid);

		$curr = time();
		$start = $InvestmentInfo->starts;
		$end = $InvestmentInfo->ends;

		$inv_diff = strtotime($end) - strtotime($start);
		$live_diff = $curr - strtotime($start);

		$total_payout = $InvestmentInfo->payout;
		$total_sec_value = $total_payout / $inv_diff;
		$ROI = $live_diff * $total_sec_value;

		return $ROI;
	}

	public function InvestmentInfo($id)
	{
		$InvestmentInfo = mysqli_query($this->dbCon, "SELECT * FROM investments WHERE id='$id'");
		$InvestmentInfo = mysqli_fetch_object($InvestmentInfo);
		return $InvestmentInfo;
	}

	public function Passwordify($password)
	{
		return md5(encrypt_salt . $password);
	}


	public function Login($username, $password)
	{
		$Login = mysqli_query($this->dbCon, "SELECT * FROM inv_users WHERE email='$username' AND password='$password'");
		$Login = mysqli_fetch_object($Login);
		return $Login;
	}


	public function UserInfo($username)
	{
		$UserInfo = mysqli_query($this->dbCon, "SELECT * FROM inv_users WHERE email='$username' OR accid='$username' OR mobile='$username'");
		$UserInfo = mysqli_fetch_object($UserInfo);
		return $UserInfo;
	}

	public function Kyc($username, $route = "users.kyc")
	{
		$Kyc = mysqli_query($this->dbCon, "SELECT kyc FROM inv_users WHERE email='$username' OR accid='$username' OR mobile='$username'");
		$Kyc = mysqli_fetch_object($Kyc);
		if ($Kyc->kyc) {
			return $route;
		}
		return "users.kyc";
	}

	public function setUserInfo($username, $keyname, $keyval)
	{
		mysqli_query($this->dbCon, "UPDATE inv_users SET `$keyname`='$keyval' WHERE accid='$username'");
		return $this->countAffected();
	}



	public function Register($name)
	{
		# code...
	}


	public function Invest($name)
	{
		# code...
	}


	public function UserExists($username)
	{
		# code...
	}

	public function WalletInfo($username)
	{
		$WalletInfo = mysqli_query($this->dbCon, "SELECT * FROM wallets WHERE accid='$username'");
		$WalletInfo = mysqli_fetch_object($WalletInfo);
		return $WalletInfo;
	}

	public function LoadCountries()
	{
		$html = "";
		$LoadCountries = mysqli_query($this->dbCon, "SELECT * FROM countries");
		while ($country = mysqli_fetch_object($LoadCountries)) {
			$html .= "<option value=\"{$country->name}\">{$country->name}</option>";
		}
		return $html;
	}

	public function SumDeposit($accid)
	{
		$SumDeposit = mysqli_query($this->dbCon, "SELECT SUM(amount) AS sum FROM deposits WHERE accid='$accid'");
		$SumDeposit = mysqli_fetch_object($SumDeposit);
		return $SumDeposit->sum;
	}


	public function SumWithdrawals($accid)
	{
		$SumWithdrawals = mysqli_query($this->dbCon, "SELECT SUM(amount) AS sum  FROM withdrawals WHERE accid='$accid'");
		$SumWithdrawals = mysqli_fetch_object($SumWithdrawals);
		return $SumWithdrawals->sum;
	}

	public function SumInvestments($accid)
	{
		$SumInvestments = mysqli_query($this->dbCon, "SELECT SUM(amount) AS sum  FROM investments WHERE accid='$accid'");
		$SumInvestments = mysqli_fetch_object($SumInvestments);
		return $SumInvestments->sum;
	}








	
	public function AdminSumDeposit()
	{
		$SumDeposit = mysqli_query($this->dbCon, "SELECT SUM(amount) AS sum FROM deposits");
		$SumDeposit = mysqli_fetch_object($SumDeposit);
		return $SumDeposit->sum;
	}


	public function AdminSumWithdrawals()
	{
		$SumWithdrawals = mysqli_query($this->dbCon, "SELECT SUM(amount) AS sum  FROM withdrawals");
		$SumWithdrawals = mysqli_fetch_object($SumWithdrawals);
		return $SumWithdrawals->sum;
	}

	public function AdminSumInvestments()
	{
		$SumInvestments = mysqli_query($this->dbCon, "SELECT SUM(amount) AS sum  FROM investments");
		$SumInvestments = mysqli_fetch_object($SumInvestments);
		return $SumInvestments->sum;
	}


	public function AdminSumBalances()
	{
		$AdminSumBalances = mysqli_query($this->dbCon, "SELECT SUM(balance) AS sum  FROM wallets");
		$AdminSumBalances = mysqli_fetch_object($AdminSumBalances);
		return $AdminSumBalances->sum;
	}
	
}
