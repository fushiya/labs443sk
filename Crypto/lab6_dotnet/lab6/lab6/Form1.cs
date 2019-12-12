using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace lab6
{
    public partial class Form1 : Form
    {
        public static readonly string characters = "абвгґдеєжзиіїйклмнопрстуфхцчшщьюяАБВГҐДЕЄЖЗИІЇЙКЛМНОПРСТУФХЦЧШЩЬЮЯ1234567890 ,.+-:\n";
        public Form1()
        {
            InitializeComponent();
        }

        public void textBox3_TextChanged(object sender, EventArgs e)
        {
            throw new System.NotImplementedException();
        }
        
        private int[] getKAndUnK(int a, int x, int y, int p)
        {
            int k;
            int unK;
            int X;
            int Y;
            for (int i = 2; i < 2000000; i++)
            {
                X = (int) (Math.Pow(a, x) % p);
                Y = (int) (Math.Pow(a, y) % p);
                k = (int) (Math.Pow(Y, x) % p);
                unK = (int) (Math.Pow(X, y) % p);
                if (k == unK && a != 0)
                {
                    textBox3.Text = Convert.ToString(a);
                    return new int[] {k, unK};
                }
                a = i;
            }
            return new int[] {-1, -1};
        }

        private void crypt(bool encrypt)
        {
            StringBuilder text = new StringBuilder(textBox3.Text);
            StringBuilder output = new StringBuilder();
            int p = Convert.ToInt32(textBoxP.Text);
            int a = Convert.ToInt32(textBoxA);
            int x = Convert.ToInt32(textBoxX);
            int y = Convert.ToInt32(textBoxY);
            int k = getKAndUnK(a, x, y, p)[0];
            int unK = getKAndUnK(a, x, y, p)[1];
            output.Append("k= " + k);
            output.Append("\nk = " + unK);
            textBox3.Text = output.ToString();
        }

        public void encrypt()
        {
            crypt(true);}

        public void decrypt()
        {
            crypt(false);
        }

        public void LoadFile()
        {
            
        }

    }
}