package codeigniter.db;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author Thanakritp
 */
public class DBConnection {

    private static Connection connection = null;

    private DBConnection() {
    }

    public static Connection getConnection() {

        try {
            // get database connection
            Class.forName(com.mysql.jdbc.Driver.class.getName());
            connection = DriverManager.getConnection(DBConfig.JDBCURL, DBConfig.USERNAME, DBConfig.PASSWORD);

        } catch (SQLException | ClassNotFoundException ex) {
            Logger.getLogger(DBConnection.class.getName()).log(Level.SEVERE, null, ex);
        }
        return connection;
    }

}
