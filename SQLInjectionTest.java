package database;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.support.ui.Select;
import org.openqa.selenium.edge.*;
import org.openqa.selenium.chrome.*;
import org.openqa.selenium.ie.*;


/*
 * This Script fills out a web form and shows that it protects against SQL INJECTION 
 * 
 * 
 * 
 * 
 */
public class SQLInjectionTest {

	public static void main(String[] args) throws InterruptedException {
		// TODO Auto-generated method stub
		/*
		 * FirefoxDriver
		 * ChromeDriver
		 * InternetExploreDriver
		 * EdgeDriver
		 * 
		 */
		
		
//System.setProperty("webdriver.edge.driver", "C:\\Users\\Terrell\\Desktop\\testing\\test\\MicrosoftWebDriver.exe"); //EDGE		
//System.setProperty("webdriver.gecko.driver", "C:\\Users\\Terrell\\Desktop\\testing\\test\\geckodriver.exe");	//FIREFOX	
System.setProperty("webdriver.chrome.driver", "C:\\Users\\Terrell\\Desktop\\testing\\test\\chromedriver.exe"); //CHROME


//WebDriver driver = new EdgeDriver();   //EDGE
//WebDriver driver= new FirefoxDriver(); //FIREFOX
WebDriver driver = new ChromeDriver(); //CHROME


driver.get("http://www-student.cse.buffalo.edu/CSE442-542/2018-Summer/team04/sprint3/feedbackform.php");
driver.manage().window().maximize();


//SELECTS TA DROPDOWN BOX AND SELECTS CSE 116
Select COURSE = new Select(driver.findElement(By.xpath("//*[@id=\"course\"]")));
Select TA = new Select(driver.findElement(By.xpath("//*[@id=\"TAname\"]")));
COURSE.selectByValue("CSE 116");
TA.selectByValue("jay");	



//FILL OUT DESCRIPTION BOX
//driver.findElement(By.xpath("//*[@id=\"exampleDescriptionArea\"]")).sendKeys("<span>ok</span>");


//SELECTS OVERALL EXPERIENCE WITH TA AS GOOD
driver.findElement(By.xpath("/html/body/div[2]/div/div/form/div[2]/ul/li[2]/input")).click();

//FILL OUT COMMENTS BOX
driver.findElement(By.xpath("//*[@id=\"exampleCommentsArea\"]")).sendKeys("SELECT * FROM Users WHERE Username='$username' AND Password='$password'");
//driver.findElement(By.xpath("//*[@id=\"exampleCommentsArea\"]")).sendKeys("OK");


//FILL OUT NAME
driver.findElement(By.xpath("//*[@id=\"exampleInputName\"]")).sendKeys("NAME");



//FILL OUT EMAIL
driver.findElement(By.xpath("//*[@id=\"exampleInputEmail1\"]")).sendKeys("anything@buffalo.edu");

//FILL OUT PHONE NUMBER
driver.findElement(By.xpath("//*[@id=\"exampleInputPNo\"]")).sendKeys("555 5555 555");


//SUBMIT FORM
//driver.findElement(By.xpath("/html/body/div[2]/div/div/form/button")).click();
	






	}

}
