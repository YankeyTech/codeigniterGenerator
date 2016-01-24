package codeigniter.db;

/**
 *
 * @author Thanakritp
 */
public class DBConfig {

    public static final String HOST = "localhost";
    public static final String PORT = "3306";
    public static final String DATABASENAME = "cosme_clinic";
    public static final String JDBCURL = "jdbc:mysql://"+HOST+"/"+DATABASENAME;

    public static final String USERNAME = "cosme";
    public static final String PASSWORD = "password";

    private DBConfig() {
    }

}
