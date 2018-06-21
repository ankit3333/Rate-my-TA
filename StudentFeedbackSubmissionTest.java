package database;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.support.ui.Select;

public class StudentFeedbackSubmissionTest {
	
	
public static void main(String[] args) throws InterruptedException {
	//System.setProperty("webdriver.edge.driver", "C:\\Users\\Terrell\\Desktop\\testing\\test\\MicrosoftWebDriver.exe"); //EDGE		
	//System.setProperty("webdriver.gecko.driver", "C:\\Users\\Terrell\\Desktop\\testing\\test\\geckodriver.exe");	//FIREFOX	
	System.setProperty("webdriver.chrome.driver", "C:\\Users\\Terrell\\Desktop\\testing\\test\\chromedriver.exe"); //CHROME
	
	//WebDriver driver = new EdgeDriver();   //EDGE
	//WebDriver driver= new FirefoxDriver(); //FIREFOX
	WebDriver driver = new ChromeDriver(); //CHROME
	
	driver.get("http://www-student.cse.buffalo.edu/CSE442-542/2018-Summer/team04/sprint3/feedbackform.php");
	driver.manage().window().maximize();


	//SELECTS TA DROPDOWN BOX AND SELECTS CSE 442
	Select COURSE = new Select(driver.findElement(By.xpath("//*[@id=\"course\"]")));
	Select TA = new Select(driver.findElement(By.xpath("//*[@id=\"TAname\"]")));
	COURSE.selectByValue("CSE 442");
	TA.selectByValue("Not Sure");	

	
	
	//CLICK DESCRIPTION CHECKBOX
	driver.findElement(By.xpath("//*[@id=\"myCheck\"]")).click();

	
	
	//FILL OUT DESCRIPTION BOX
	driver.findElement(By.xpath("//*[@id=\"exampleTextarea\"]")).sendKeys("The ugly guy");


	//SELECTS OVERALL EXPERIENCE WITH TA AS MEAN 
	driver.findElement(By.xpath("/html/body/div[2]/div/div/form/div[2]/ul/li[4]/input")).click();

	//FILL OUT COMMENTS BOX
	driver.findElement(By.xpath("//*[@id=\"exampleCommentsArea\"]")).sendKeys("The TA is mean");
	//driver.findElement(By.xpath("//*[@id=\"exampleCommentsArea\"]")).sendKeys("OK");


	//FILL OUT NAME
	driver.findElement(By.xpath("//*[@id=\"exampleInputName\"]")).sendKeys("Kevin");



	//FILL OUT EMAIL
	driver.findElement(By.xpath("//*[@id=\"exampleInputEmail1\"]")).sendKeys("kevin@buffalo.edu");

	//FILL OUT PHONE NUMBER
	driver.findElement(By.xpath("//*[@id=\"exampleInputPNo\"]")).sendKeys("555 5555 555");


	//SUBMIT FORM
	//driver.findElement(By.xpath("/html/body/div[2]/div/div/form/button")).click();
	
	
	
}
}
