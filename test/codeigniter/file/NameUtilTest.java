package codeigniter.file;

import codeigniter.rule.condition.NameUtil;
import org.junit.After;
import org.junit.AfterClass;
import org.junit.Before;
import org.junit.BeforeClass;
import org.junit.Test;
import static org.junit.Assert.*;

/**
 *
 * @author Thanakrit.P
 */
public class NameUtilTest {

    public String result;

    public NameUtilTest() {
    }

    @BeforeClass
    public static void setUpClass() {
    }

    @AfterClass
    public static void tearDownClass() {
    }

    @Before
    public void setUp() {
    }

    @After
    public void tearDown() {
    }

    @Test
    public void firstCharUpper() {
        result = NameUtil.firstCharUpper("xyz_abc");
        System.out.println(result);
        assertTrue("Xyz_abc".equals(result));
    }

    @Test
    public void classModelName() {
        result = NameUtil.classModelName("xYz_ABc");
        System.out.println(result);
        assertTrue("Xyz_abc_model".equals(result));
    }
    
     @Test
    public void replace() {
        result = "class <MODELCLASSNAME> extends CI_Model {";
        result = result.replaceAll("<MODELCLASSNAME>","Xxx" );
         System.out.println(result);
    }
    
    

}
