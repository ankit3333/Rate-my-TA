package database;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.edge.EdgeDriver;


public class ProfessorPanelLogin  {
public static void main(String[] args) throws InterruptedException {
	System.setProperty("webdriver.edge.driver", "C:\\Users\\Terrell\\Desktop\\testing\\test\\MicrosoftWebDriver.exe"); //EDGE		
	//System.setProperty("webdriver.gecko.driver", "C:\\Users\\Terrell\\Desktop\\testing\\test\\geckodriver.exe");	//FIREFOX	
	//System.setProperty("webdriver.chrome.driver", "C:\\Users\\Terrell\\Desktop\\testing\\test\\chromedriver.exe"); //CHROME
	
	WebDriver driver = new EdgeDriver();   //EDGE
	//WebDriver driver= new FirefoxDriver(); //FIREFOX
	//WebDriver driver = new ChromeDriver(); //CHROME
	
	driver.get("http://www-student.cse.buffalo.edu/CSE442-542/2018-Summer/team04/");
	driver.manage().window().maximize();
	
	driver.findElement(By.xpath("/html/body/div[2]/div/div/form/div[2]/input")).sendKeys("matt");
	driver.findElement(By.xpath("/html/body/div[2]/div/div/form/div[3]/input")).sendKeys("matt");

	driver.findElement(By.xpath("/html/body/div[2]/div/div/form/div[4]/button")).click();
	driver.findElement(By.xpath("/html/body/div[2]/div/div/form/div[4]/button")).click();

	
	

}
}

