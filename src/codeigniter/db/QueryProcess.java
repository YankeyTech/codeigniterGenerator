package codeigniter.db;

import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.ResultSetMetaData;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.ArrayList;
import java.util.List;

public class QueryProcess {

    private static Connection connection = null;
    private static Statement statement = null;
    private static ResultSet resultSet = null;
    

    private QueryProcess() {
    }

    public static boolean connectionClose() {
        boolean returnBool = false;
        try {

            if (statement != null) {
                statement.close();
                statement = null;
            }

            if (resultSet != null) {
                resultSet.close();
                resultSet = null;
            }

            if (connection != null) {
                connection.close();
                connection = null;
            }
            returnBool = true;

        } catch (SQLException se) {
        }
        return returnBool;
    }

    public static ResultSet executeQuery(String sql) throws SQLException {
        connection = DBConnection.getConnection();
        statement = connection.createStatement();
        resultSet = statement.executeQuery(sql);

        return resultSet;
    }


}
