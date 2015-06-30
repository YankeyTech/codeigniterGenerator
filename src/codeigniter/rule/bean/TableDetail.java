package codeigniter.rule.bean;

import java.util.List;

/**
 *
 * @author Thanakrit.P
 */
public class TableDetail {

    private String tableName;
    private String primaryKey;
    private List<String> colums;
    private String dbType;
    private String modelClassName;
    private String controllerClassName;
    private String viewName;

    public String getTableName() {
        return tableName;
    }

    public void setTableName(String tableName) {
        this.tableName = tableName;
    }

    public String getPrimaryKey() {
        return primaryKey;
    }

    public void setPrimaryKey(String primaryKey) {
        this.primaryKey = primaryKey;
    }

    public List<String> getColums() {
        return colums;
    }

    public void setColums(List<String> colums) {
        this.colums = colums;
    }

    public String getDbType() {
        return dbType;
    }

    public void setDbType(String dbType) {
        this.dbType = dbType;
    }

    public String getModelClassName() {
        return modelClassName;
    }

    public void setModelClassName(String modelClassName) {
        this.modelClassName = modelClassName;
    }

    public String getControllerClassName() {
        return controllerClassName;
    }

    public void setControllerClassName(String controllerClassName) {
        this.controllerClassName = controllerClassName;
    }

    public String getViewName() {
        return viewName;
    }

    public void setViewName(String viewName) {
        this.viewName = viewName;
    }
    
    
    
    
}
