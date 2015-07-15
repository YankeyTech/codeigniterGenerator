/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package codeigniter.generator;

import codeigniter.db.QueryData;
import codeigniter.rule.condition.NameUtil;
import java.sql.SQLException;
import java.util.List;

/**
 *
 * @author Thanakrit.P
 */
public class GenMenu {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) throws SQLException {
        List<String> tables = QueryData.showTables();
        for (String table : tables) {
            String str = "<li>\n"
                    + "<a href=\"<?php echo admin_" + NameUtil.dbTypeShort(table) + "_site('" + NameUtil.controllerClassNameLower(table) + "'); ?>\"> " + NameUtil.controllerClassNameLower(table) + " </a>\n"
                    + "<li>\n";
            System.out.println(str);
        }
    }

}
