package codeigniter.rule;

import codeigniter.rule.bean.HeaderAndDataBean;
import codeigniter.rule.bean.HeaderTemplateBean;
import codeigniter.rule.bean.TableDetail;
import codeigniter.rule.condition.RuleConst;
import codeigniter.rule.condition.NameUtil;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import org.json.simple.JSONObject;
import org.json.simple.JSONValue;
import org.json.simple.parser.ParseException;

/**
 *
 * @author Thanakrit.P
 */
public class RuleSet {

    private final List<String> ruleSetCondition = new ArrayList<>();

//    private final String table;
//    private final List<String> colums;
    private final List<String> lineOfFile;
    private final String templateName;
    private int lineReturn;
    private TableDetail tableDetail;

    public RuleSet(TableDetail tableDetail, List<String> lineOfFile, String templateName) {

        this.tableDetail = tableDetail;

        this.lineOfFile = lineOfFile;
        this.templateName = templateName;

        ruleSetCondition.add(RuleConst.MODELCLASSNAME);
        ruleSetCondition.add(RuleConst.MODELCLASSNAMELOWER);
        ruleSetCondition.add(RuleConst.TABLENAME);
        ruleSetCondition.add(RuleConst.TEMPLATENAME);
        ruleSetCondition.add(RuleConst.PRIMARYKEY);
        ruleSetCondition.add(RuleConst.DBTYPE);
        ruleSetCondition.add(RuleConst.DBTYPESHORT);
        ruleSetCondition.add(RuleConst.CONTROLLERCLASSNAME);
        ruleSetCondition.add(RuleConst.CONTROLLERLOWER);
        ruleSetCondition.add(RuleConst.VIEWNAME);

    }

    public HeaderAndDataBean result() throws Exception {
        StringBuilder result = new StringBuilder();
        String headerLine = lineOfFile.get(0); //get header line
        HeaderTemplateBean header = readHeaderLine(headerLine);
        lineOfFile.remove(0); //remove header line
        for (int index = 0; index < lineOfFile.size(); index++) {
            String line = lineOfFile.get(index);
            String ruleResult;
            if (!RuleConst.COLUMLOOP_BEGIN.equals(line.trim())) {
                ruleResult = ruleResult(line);
            } else {
                ruleResult = ruleColumMapping(index);
                index = lineReturn;
            }

            result.append(ruleResult);
            result.append("\n");
        }

        HeaderAndDataBean headerAndData = new HeaderAndDataBean();
        headerAndData.setHeader(header);
        headerAndData.setData(result.toString());
        return headerAndData;
    }

    private String ruleResult(String message) {
        String ruleResult;
        for (String ruleCondition : ruleSetCondition) {
            ruleResult = ruleMapping(ruleCondition);
            message = message.replaceAll(ruleCondition, ruleResult);
        }
        return message;
    }

    public String ruleMapping(String Condition) {
        String result;

        switch (Condition) {
            case RuleConst.MODELCLASSNAME:
                result = this.tableDetail.getModelClassName();
                break;
            case RuleConst.MODELCLASSNAMELOWER:
                result = this.tableDetail.getModelClassNameLower();
                break;
            case RuleConst.CONTROLLERCLASSNAME:
                result = this.tableDetail.getControllerClassName();
                break;
            case RuleConst.CONTROLLERLOWER:
                result = this.tableDetail.getControllerClassNameLower();
                break;
            case RuleConst.VIEWNAME:
                result = this.tableDetail.getViewName();
                break;
            case RuleConst.TABLENAME:
                result = this.tableDetail.getTableName();
                break;
            case RuleConst.TEMPLATENAME:
                result = templateName;
                break;
            case RuleConst.PRIMARYKEY:
                result = this.tableDetail.getPrimaryKey();
                break;
            case RuleConst.DBTYPE:
                result = this.tableDetail.getDbType();
                break;
            case RuleConst.DBTYPESHORT:
                result = this.tableDetail.getDbTypeShort();
                break;
            default:
                result = RuleConst.UNDEFINE_RULE;
                break;
        }
        return result;
    }

    public String ruleColumMapping(int index) throws Exception {
        List<String> lineInLoop = getLineInLoop(index);
        StringBuilder result = new StringBuilder();
        int i = 1;
        for (String colum : this.tableDetail.getColums()) {
            result.append(ruleColumMappingResult(colum, lineInLoop));
            if (i < this.tableDetail.getColums().size()) {
                result.append("\n");
            }
            i++;
        }
        return result.toString();
    }

    private List<String> getLineInLoop(int index) throws Exception {
        List<String> lineInLoop;
        lineInLoop = getLineInloopControl(index);
        lineInLoop = cutLoopCommand(lineInLoop);
        return lineInLoop;
    }

    private List<String> getLineInloopControl(int i) throws Exception {
        List<String> temp = new ArrayList<>();
        boolean checkEndColumLoop = false;
        for (int index = i; index < lineOfFile.size(); index++) {
            String line = lineOfFile.get(index);
            temp.add(line);
            if (RuleConst.COLUMLOOP_END.equals(line.trim())) {
                checkEndColumLoop = true;
                lineReturn = index;
                break;
            }
        }
        if (!checkEndColumLoop) {
            throw new RuleSetException(templateName + " Line" + i + " :Template Not COLUMLOOP_END");
        }
        return temp;
    }

    private List<String> cutLoopCommand(List<String> lineInLoop) {
        lineInLoop.remove(0);
        lineInLoop.remove(lineInLoop.size() - 1);
        return lineInLoop;
    }

    private String ruleColumMappingResult(String colum, List<String> temp) {
        StringBuilder result = new StringBuilder();
        for (String line : temp) {
            line = line.replaceAll(RuleConst.COLUMNAME, colum);
            line = ruleResult(line);
            result.append(line);
            if (temp.size() > 1) {
                result.append("\n");
            }

        }
        return result.toString();
    }

    private HeaderTemplateBean readHeaderLine(String headerLine) {

        HashMap<String, String> header;
        try {

            JSONObject jSONObject = (JSONObject) JSONValue.parseWithException(headerLine);
            header = (HashMap<String, String>) jSONObject.get(RuleConst.HEADER_KEY);

        } catch (ParseException ex) {
            throw new RuleSetException(templateName + " : Template Header Invalid " + ex);
        }

        String directory = header.get(RuleConst.DIRECTORY_KEY);
        String extention = header.get(RuleConst.EXTENTION_KEY);
        String filename = header.get(RuleConst.FILENAME_KEY);

        directory = NameUtil.valueByDefault(directory, RuleConst.DIRECTORY_DEFAULT);
        extention = NameUtil.valueByDefault(extention, RuleConst.EXTENTION_DEFAULT);
        filename = NameUtil.valueByDefault(filename, RuleConst.FILENAME_DEFAULT);

        directory = ruleResult(directory);
        if (!directory.isEmpty()) {
            directory = directory.concat("/");
        }
        extention = ruleResult(extention);
        filename = ruleResult(filename);

        HeaderTemplateBean bean = new HeaderTemplateBean();
        bean.setDirectory(directory);
        bean.setExtention(extention);
        bean.setFilename(filename);

        return bean;

    }

}
