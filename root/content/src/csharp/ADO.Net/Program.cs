using System;
using System.Data.Sql;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Data;
using System.Data.SqlClient;

// Difference between OLE, ODBC, ADO.NET ?
// Difference between ADODB versus SQLClient

namespace ConsoleApplication4
{
    class Program
    {
        private System.Data.SqlClient.SqlConnection SqlCon;
        private System.Data.SqlClient.SqlCommand SqlCom;
        private System.Data.SqlClient.SqlDataReader SqlDR;
        private string ConStr;


        static void Main(string[] args)
        {
            string Database = "mydb";
            Program prog = new Program();
            prog.Connect(Database);
            prog.ListTables(Database);
            prog.Disconnect();
        }

        private void Connect(string Database)
        {
            string Server = "AnishPC\\SQLEXPRESS";
            string Username = "sa";
            string Password = "";

            ConStr = "Server=" + Server + ";";
            ConStr += "User ID=" + Username + ";";
            ConStr += "Password=" + Password + ";";
            ConStr += "Initial Catalog=" + Database + ";";
            ConStr += "Integrated Security=SSPI;";              // What is Integrated Security, What is SSPI

            SqlCon = new System.Data.SqlClient.SqlConnection(ConStr);

            try
            {
                Console.WriteLine("Openning connection...\r\n");
                if (SqlCon.State == ConnectionState.Closed)
                {
                    SqlCon.Open();
                }
                Console.WriteLine("SQL Connection State = " + SqlCon.State + "\r\n");
            }
            catch (System.Data.SqlClient.SqlException Ex)
            {
                Console.WriteLine(Ex.Message + "\r\n");
                Console.WriteLine("Could not access the database.\r\nPlease make sure you completed the fields with the correct information and try again.\r\n\r\nMore details:\r\n" + Ex.Message);
            }
        }

        private void ListTables(string Database)
        {
            if (SqlCon.State == ConnectionState.Open)
            {
                SqlCom = new System.Data.SqlClient.SqlCommand("SELECT * FROM [mydb].[dbo].[user]", SqlCon);
                SqlDR = SqlCom.ExecuteReader();
                Console.WriteLine("Content in Table [" + Database + "].[dbo].[user] :\r\n");
                while (SqlDR.Read())
                {
                    Console.WriteLine("Values >> " + SqlDR[0] + " , " + SqlDR[1] + " , " + SqlDR[2] + " , " + SqlDR[3] + " , " + SqlDR[4] + "\r\n");
                }
            }
        }

        private void Disconnect()
        {
            if (SqlCon.State == ConnectionState.Open)
            {
                SqlCon.Close();
            }
        }
    }
}
