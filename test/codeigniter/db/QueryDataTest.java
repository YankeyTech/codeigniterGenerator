package codeigniter.db;

import java.sql.SQLException;
import java.util.List;
import org.junit.After;
import org.junit.AfterClass;
import static org.junit.Assert.assertNotNull;
import org.junit.Before;
import org.junit.BeforeClass;
import org.junit.Test;

public class QueryDataTest {

    public QueryDataTest() {
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
    public void checkShowTables() throws SQLException {
        assertNotNull(QueryData.showTables());
    }

    @Test
    public void showTables() throws SQLException {
        List<String> result = QueryData.showTables();
        for (String result1 : result) {
            System.out.println(result1);
        }
        System.out.println("+++++++++++");
    }

    @Test
    public void checkShowColums() throws SQLException {
        String table = QueryData.showTables().get(0);
        assertNotNull(QueryData.showColums(table));
    }

    @Test
    public void showColums() throws SQLException {

        String table = QueryData.showTables().get(0);
        System.out.println("showColum : " + table);
        List<String> result = QueryData.showColums(table);
        for (String result1 : result) {
            System.out.println(result1);
        }
        System.out.println("+++++++++++");
    }

    @Test
    public void showPrimaryKey() throws SQLException {
        System.out.println("++++++ showPrimaryKey +++++");
        List<String> result = QueryData.showTables();
        for (String result1 : result) {
            System.out.println(
                    QueryData.showPrimaryKey(result1)
            );
        }
        System.out.println("+++++++++++");
    }

}
