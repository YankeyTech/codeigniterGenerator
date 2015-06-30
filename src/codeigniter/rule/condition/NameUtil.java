package codeigniter.rule.condition;

/**
 *
 * @author Thanakrit.P
 */
public class NameUtil {

    public static final String MASTERTABLE = "master";
    public static final String TRANACTIONTABLE = "transection";
    public static final String MASTER = "ms";
    public static final String TRANACTION = "tr";
    public static final String _MASTER = "_ms";
    public static final String _TRANACTION = "_tr";

    private NameUtil() {
    }

    public static String classModelName(String table) {

        String classModelName = NameUtil.firstCharUpper(table.toLowerCase());
        return classModelName + "_model";
    }

    public static String firstCharUpper(String str) {
        return str.substring(0, 1).toUpperCase() + str.substring(1, str.length());
    }

    public static String valueByDefault(String originStr, String defaultStr) {
        String result = defaultStr;
        if (originStr != null && !(originStr.trim().isEmpty())) {
            result = originStr;
        }

        return result;
    }

    public static String DbType(String table) {
        return table.toLowerCase().endsWith(TRANACTION) ? TRANACTIONTABLE : MASTERTABLE;
    }

    public static String controllerClassName(String table) {
        table = table.toLowerCase()
                .replaceAll(_MASTER, "")
                .replaceAll(_TRANACTION, "")
                .replaceAll("_", "");
        table = NameUtil.firstCharUpper(table.toLowerCase());
        return table;
    }
    public static String viewName(String table) {
        return NameUtil.controllerClassName(table).toLowerCase();
                
    }

}
