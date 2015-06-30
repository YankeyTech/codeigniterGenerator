package codeigniter.rule.bean;

/**
 *
 * @author Thanakrit.P
 */
public class HeaderAndDataBean {

    private HeaderTemplateBean header;
    private String data;

    public HeaderAndDataBean() {
    }

    public HeaderTemplateBean getHeader() {
        return header;
    }

    public void setHeader(HeaderTemplateBean header) {
        this.header = header;
    }

    public String getData() {
        return data;
    }

    public void setData(String data) {
        this.data = data;
    }

}
