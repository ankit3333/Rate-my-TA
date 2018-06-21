package database;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;

public class TAAdminAddClassTest {
public static void main(String[] args) throws InterruptedException {
	//System.setProperty("webdriver.edge.driver", "C:\\Users\\Terrell\\Desktop\\testing\\test\\MicrosoftWebDriver.exe"); //EDGE		
	//System.setProperty("webdriver.gecko.driver", "C:\\Users\\Terrell\\Desktop\\testing\\test\\geckodriver.exe");	//FIREFOX	
	System.setProperty("webdriver.chrome.driver", "C:\\Users\\Terrell\\Desktop\\testing\\test\\chromedriver.exe"); //CHROME
	
	//WebDriver driver = new EdgeDriver();   //EDGE    
	//WebDriver driver= new FirefoxDriver(); //FIREFOX
	WebDriver driver = new ChromeDriver(); //CHROME
	
	driver.get("http://www-student.cse.buffalo.edu/CSE442-542/2018-Summer/team04/Prof_Panel.php");
	driver.manage().window().maximize();

	
	//CLICKS ADD COURSE BUTTON ON TOP
	driver.findElement(By.xpath("/html/body/div[1]/div/ul/li/button")).click();
	driver.findElement(By.xpath("/html/body/div[1]/div/ul/li/button")).click();

	driver.findElement(By.xpath("//*[@id=\"exampleCourseInput\"]")).sendKeys("CSE116");
	driver.findElement(By.xpath("//*[@id=\"exampleNameInput\"]")).sendKeys("Nick");
	driver.findElement(By.xpath("//*[@id=\"btnSubmit\"]")).click();
}
}
