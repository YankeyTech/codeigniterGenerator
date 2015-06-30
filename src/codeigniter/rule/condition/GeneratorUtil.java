/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package codeigniter.rule.condition;

import codeigniter.db.QueryData;
import codeigniter.rule.bean.TableDetail;
import java.sql.SQLException;

/**
 *
 * @author Thanakrit.P
 */
public class GeneratorUtil {

    

    private GeneratorUtil() {
    }

    public static TableDetail getTableDetail(String table) throws SQLException {
        TableDetail tableDetail = new TableDetail();
        tableDetail.setTableName(table);
        tableDetail.setColums(QueryData.showColums(table));
        tableDetail.setPrimaryKey(QueryData.showPrimaryKey(table));
        tableDetail.setDbType(NameUtil.DbType(table));
        tableDetail.setModelClassName(NameUtil.classModelName(table));
        tableDetail.setControllerClassName(NameUtil.controllerClassName(table));
        tableDetail.setViewName(NameUtil.viewName(table));
        return tableDetail;
    }

}
