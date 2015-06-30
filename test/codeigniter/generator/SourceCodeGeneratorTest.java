package codeigniter.generator;

import codeigniter.db.DBConnection;
import codeigniter.db.QueryData;
import codeigniter.file.FilesGenerator;
import codeigniter.rule.RuleSet;
import codeigniter.rule.bean.HeaderAndDataBean;
import codeigniter.rule.bean.HeaderTemplateBean;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import org.apache.log4j.Logger;
import org.junit.After;
import org.junit.AfterClass;
import static org.junit.Assert.assertNotNull;
import org.junit.Before;
import org.junit.BeforeClass;
import org.junit.Test;

/**
 *
 * @author Thanakrit.P
 */
public class SourceCodeGeneratorTest {

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
    public void showTables() {
        assertNotNull(DBConnection.getConnection());
    }

}
