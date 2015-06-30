package codeigniter.generator;

import codeigniter.file.FilesGenerator;
import java.io.IOException;
import java.util.List;
import org.apache.log4j.Logger;
/**
 *
 * @author Thanakrit.P
 */
public class CodeigniterGenerator {

    private static final Logger LOGGER = Logger.getLogger(CodeigniterGenerator.class);

    private CodeigniterGenerator() {
    }

    public static void main(String[] args) throws IOException, Exception {
        LOGGER.info("CodeigniterGenerator RUN");
        
        long fromTime = System.currentTimeMillis();
        FilesGenerator.cleanOutputDirectory();
        CodeigniterGenerator.run();
        long time = System.currentTimeMillis() - fromTime;
       
        LOGGER.info("CodeigniterGenerator RUN Success :" + time + " ms.");
    }

    public static void run() throws Exception {
        try {
            List<String> templateNameList = FilesGenerator.getAllTemplateName();
            SourceCodeGenerator codeGenerator = new SourceCodeGenerator();
            for (String templateName : templateNameList) {
                
                LOGGER.info("#########################################################");
                LOGGER.info("codeGenerator templateName :" + templateName );
                
                codeGenerator.setTemplateFileName(templateName);
                codeGenerator.run();
            }
        } catch (IOException ex) {
            LOGGER.error("IOException : ", ex);
        }

    }

}
