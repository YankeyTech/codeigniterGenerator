package codeigniter.file;

import java.io.File;
import java.io.IOException;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.List;
import java.util.Locale;
import org.apache.commons.io.FileUtils;
import org.apache.commons.io.FilenameUtils;

public class FilesGenerator {

    private static final SimpleDateFormat DATEFORMAT = new SimpleDateFormat("dd-MM-yyyy", new Locale("en", "us"));

    private FilesGenerator() {
    }

    public static boolean mkDirWhenNotExists(String directoryPath) throws IOException {
        File directory = new File(directoryPath);
        String log = "FilesGenerator Directory is exists : ";
        if (!directory.exists()) {
            FileUtils.forceMkdir(directory);
            log = " FilesGenerator Directory is not exists forceMakedir : ";
        }
        return true;
    }

    public static boolean writeOutputFile(String filename, String data) throws IOException {

        String filePath = OutputConf.OUTPUTDIR + filename ;
        File file = new File(filePath);
        FileUtils.writeStringToFile(file, data, OutputConf.ENCODING);

        return true;
    }

    // ************************************************************************
    public static boolean mkOutputDirWhenNotExists() throws IOException {
        return mkDirWhenNotExists(OutputConf.OUTPUTDIR);
    }

    public static String readFileModelTemplate() throws IOException {
        return FileUtils.readFileToString(new File("data/template/model_template.txt"), OutputConf.ENCODING);
    }

    public static List<String> readLinesTemplate(String template) throws IOException {
        List ModelTemplate = FileUtils.readLines(new File("data/template/" + template), OutputConf.ENCODING);
        return ModelTemplate;
    }

    public static List<String> getAllTemplateName() throws IOException {
        File templateDir = new File(OutputConf.TEMPLATEDIR);
        List<String> templateName = new ArrayList<>();
        for (File file : templateDir.listFiles()) {
           if (FilenameUtils.isExtension(file.getName(), OutputConf.TEMPLATEEXTENSION)) {
                templateName.add(file.getName());
            }
        }
        return templateName;
    }

    public static void cleanOutputDirectory() {
        try {
            File directory = new File(OutputConf.OUTPUTDIR);
            if (directory.exists()) {
                FileUtils.cleanDirectory(new File(OutputConf.OUTPUTDIR));
            }
        } catch (IOException ex) {

        }
    }

}
