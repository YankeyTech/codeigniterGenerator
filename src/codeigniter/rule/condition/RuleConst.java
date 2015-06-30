package codeigniter.rule.condition;

/**
 *
 * @author Thanakrit.P
 */
public class RuleConst {

    //RULE NAME
    public static final String UNDEFINE_RULE = "{Undefine Rule}";
    public static final String MODELCLASSNAME = "<MODELCLASSNAME>";
    public static final String CONTROLLERCLASSNAME = "<CONTROLLERCLASSNAME>";
    public static final String VIEWNAME = "<VIEWNAME>";
    
    public static final String TABLENAME = "<TABLENAME>";
    public static final String TEMPLATENAME = "<TEMPLATENAME>";

    public static final String PRIMARYKEY = "<PRIMARYKEY>";
    public static final String DBTYPE = "<DBTYPE>";
    //LOOP RULE NAME
    public static final String COLUMLOOP_BEGIN = ">>COLUMLOOP_BEGIN";
    public static final String COLUMLOOP_END = "<<COLUMLOOP_END";
    public static final String COLUMNAME = "<COLUMNAME>";

    //HEADER PROPERTIES
    public static final String DIRECTORY_KEY = "directory";
    public static final String EXTENTION_KEY = "extention";
    public static final String FILENAME_KEY = "filename";
    public static final String HEADER_KEY = "header";

    //HEADER PROPERTIES DEFAULT
    public static final String DIRECTORY_DEFAULT = TEMPLATENAME;
    public static final String EXTENTION_DEFAULT = "txt";
    public static final String FILENAME_DEFAULT = TABLENAME;

}
