package codeigniter.generator;

import codeigniter.rule.condition.GeneratorUtil;
import codeigniter.db.QueryData;
import codeigniter.file.FilesGenerator;
import codeigniter.rule.RuleSet;
import codeigniter.rule.bean.HeaderAndDataBean;
import codeigniter.rule.bean.HeaderTemplateBean;
import codeigniter.rule.bean.TableDetail;
import java.io.IOException;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import org.apache.log4j.Logger;

/**
 *
 * @author Thanakrit.P
 */
public class SourceCodeGenerator {

    private static final Logger LOGGER = Logger.getLogger(SourceCodeGenerator.class);

    private String templateFileName;
    protected static List<String> tables = new ArrayList<>();
    protected static Map<String, TableDetail> tableDetailMap = new HashMap<>();

    public SourceCodeGenerator() {
    }

    public void run() throws SQLException, IOException, Exception {
        setAllColums();
        tables = this.getTables();
        FilesGenerator.mkOutputDirWhenNotExists();
        generateFile();

    }

    public void generateFile() throws Exception {

        int index = 0;
        for (String table : tables) {
            long fromTime = System.currentTimeMillis();
            HeaderAndDataBean headerAndData = generateDataFromTemplate(table, templateFileName);
            String dataDataFromTemplate = headerAndData.getData();
            HeaderTemplateBean header = headerAndData.getHeader();

            String fileName = header.getFilename() + "." + header.getExtention();
            String path = header.getDirectory() + fileName;
            FilesGenerator.writeOutputFile(path, dataDataFromTemplate);
            long time = System.currentTimeMillis() - fromTime;
            LOGGER.info((index + 1) + "." + fileName + " :" + time + " ms.");
            index++;
        }
        LOGGER.info(index + " Files Created..");
    }

    public HeaderAndDataBean generateDataFromTemplate(String table, String template) throws Exception {
        List<String> line = FilesGenerator.readLinesTemplate(template);
        TableDetail tableDetail = tableDetailMap.get(table);
        RuleSet ruleSet = new RuleSet(tableDetail, line, template);
        return ruleSet.result();
    }

    protected List<String> getTables() throws SQLException {
        if (tables.isEmpty()) {
            SourceCodeGenerator.tables = QueryData.showTables();
        }
        return tables;
    }

    protected Map<String, TableDetail> setAllColums() throws SQLException {
        tableDetailMap = new HashMap<>();
        tables = getTables();

        for (String table : tables) {
            tableDetailMap.put(table, GeneratorUtil.getTableDetail(table));
        }
        return tableDetailMap;
    }

    public String getTemplateFileName() {
        return templateFileName;
    }

    public void setTemplateFileName(String templateFileName) {
        this.templateFileName = templateFileName;
    }

}
