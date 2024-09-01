import java.awt.*;
import java.awt.event.*;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.util.Objects;

public  class UserRegi extends Frame implements ActionListener, WindowListener{

    String b,iD;
    Button back,close,submit,clr;
    Label l,l1,l2,error;
    TextField t1,t2;
    UserRegi(String a,String ID){

        b=a;
        iD=ID;

        setTitle(" User Registration ");
        setSize(500, 300);
        setLocationRelativeTo(null);
        setLayout(null);
        setVisible(true);
        setBackground(new Color(0xd8B1D2));
        setResizable(false);
        addWindowListener(this);

        l = new Label(" User Registration ");
        l.setBounds(160, 60, 250, 25);
        l.setFont(new Font("Segoe UI", Font.BOLD, 20));
        l.setForeground(new Color(0x650529));
        add(l);


        l1 = new Label("User ID :");
        l1.setBounds(80, 130, 100, 25);
        l1.setFont(new Font("Segoe UI", Font.BOLD, 17));
        l1.setForeground(Color.BLACK);
        add(l1);
        t1 = new TextField();
        t1.setBounds(250, 130, 200, 20);
        t1.setFont(new Font("Segoe UI", Font.PLAIN, 13));
        add(t1);

        l2 = new Label("Password :");
        l2.setBounds(80, 170, 150, 25);
        l2.setFont(new Font("Segoe UI", Font.BOLD, 17));
        l2.setForeground(Color.BLACK);
        add(l2);
        t2 = new TextField();
        t2.setBounds(250, 170, 200, 20);
        t2.setFont(new Font("Segoe UI", Font.PLAIN, 13));
        add(t2);

        error = new Label("");
        error.setBounds(250, 195, 200, 20);
        error.setFont(new Font("Segoe UI", Font.ITALIC, 12));
        error.setForeground(Color.red);
        add(error);





        submit = new Button("Submit");
        submit.setBounds(385, 225, 65, 23);
        submit.setFont(new Font("Segoe UI", Font.BOLD, 13));
        submit.setForeground(new Color(0x124593));
        add(submit);
        submit.addActionListener(this);

        clr = new Button("Clear");
        clr.setBounds(315, 225, 65, 23);
        clr.setFont(new Font("Segoe UI", Font.BOLD, 13));
        clr.setForeground(Color.RED);
        add(clr);
        clr.addActionListener(this);

        back = new Button("Back");
        back.setBounds(315, 255, 65, 23);
        back.setFont(new Font("Segoe UI", Font.BOLD, 13));
        back.setForeground(new Color(0x124593));
        add(back);
        back.addActionListener(this);

        close = new Button("Close");
        close.setBounds(385, 255, 65, 23);
        close.setFont(new Font("Segoe UI", Font.BOLD, 13));
        close.setForeground(Color.RED);
        add(close);
        close.addActionListener(this);

    }


    public static void main(String[] args) {
        UserRegi r=new UserRegi("","");
    }








    @Override
    public void actionPerformed(ActionEvent e) {

        if(e.getActionCommand().equals("Back")){
            if(Objects.equals(b, "Admin")){
                setVisible(false);
                new Admin_Logged_IN(iD);
            }else{
                setVisible(false);
                new Registration();
            }
        }
        if(e.getActionCommand().equals("Close")){
            System.exit(0);
        }
        if(e.getActionCommand().equals("Clear")){
            t1.setText("");
            t2.setText("");
            error.setText("");
        }

        if(e.getActionCommand().equals("Submit")){

            if(t1.getText().equals("") || t2.getText().equals(""))
            {
                error.setText("No Field Should be Empty");
            }else
            {
                String id,pass;
                id= t1.getText();
                try {

                    String url = "jdbc:mysql://localhost:3306/Login";
                    String username = "root"; // MySQL credentials
                    String password = "";
                    Connection connection = DriverManager.getConnection(url, username, password);

                    String sql = "SELECT User_ID FROM logindetail where User_ID=?";
                    PreparedStatement preparedStatement = connection.prepareStatement(sql);
                    preparedStatement.setString(1, id);

                    ResultSet rs = preparedStatement.executeQuery();

                    if (rs.next()) {

                        String column1Value = rs.getString("User_ID");
                        error.setText("User Id Alredy Exist");
                        System.out.println("ID " + column1Value);
                        System.out.println("Matched");
                        connection.close();

                    } else {

                        error.setText("");
                        System.out.println("Not Matched");
                        pass = t2.getText();

                        sql = "INSERT INTO logindetail values('---',?,?)";
                        preparedStatement = connection.prepareStatement(sql);
                        preparedStatement.setString(1, id);
                        preparedStatement.setString(2, pass);


                        int rowsAffected = preparedStatement.executeUpdate();

                        if (rowsAffected > 0) {

                            error.setText("Added Succecfully");
                            System.out.println("Data Added Successfully");

                            setVisible(false);
                            new Login();

                        } else {

                            error.setText("Data Not Added");
                            System.out.println("Data not added");

                        }

                    }

                } catch (Exception ev) {

                    error.setText("Connection Error To DB");
                    System.out.println("Error " + ev);
                }
            }


        }

    }

    @Override
    public void windowOpened(WindowEvent e) {

    }

    @Override
    public void windowClosing(WindowEvent e) {
        System.exit(0);
    }

    @Override
    public void windowClosed(WindowEvent e) {

    }

    @Override
    public void windowIconified(WindowEvent e) {

    }

    @Override
    public void windowDeiconified(WindowEvent e) {

    }

    @Override
    public void windowActivated(WindowEvent e) {

    }

    @Override
    public void windowDeactivated(WindowEvent e) {

    }
}
