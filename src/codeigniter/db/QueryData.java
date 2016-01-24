package codeigniter.db;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

public class QueryData {

    private static ResultSet resultSet = null;

    private QueryData() {
    }

    public static List<String> showTables() throws SQLException {
        String sql = " SHOW TABLES ";
        List<String> result = new ArrayList<>();

        resultSet = QueryProcess.executeQuery(sql);
        while (resultSet.next()) {
            result.add(resultSet.getString(1));
        }
        QueryProcess.connectionClose();
        return result;
    }

    public static List<String> showColums(String table) throws SQLException {
        String sql = " SHOW COLUMNS FROM " + table;
        List<String> result = new ArrayList<>();

        resultSet = QueryProcess.executeQuery(sql);
        while (resultSet.next()) {
            boolean pk = "PRI".equals(resultSet.getString("Key"));
            boolean del = "is_deleted".equals(resultSet.getString("Field"));
            if (!pk && !del) {
                result.add(resultSet.getString("Field"));
            }
        }
        QueryProcess.connectionClose();
        return result;
    }

    public static String showPrimaryKey(String table) throws SQLException {
        String sql = " SHOW INDEX  FROM  " + table + " WHERE Key_name ='PRIMARY' ";
        List<String> result = new ArrayList<>();

        resultSet = QueryProcess.executeQuery(sql);
        while (resultSet.next()) {
            result.add(resultSet.getString("Column_name"));
        }
        QueryProcess.connectionClose();
        return result.get(0);
    }

}
