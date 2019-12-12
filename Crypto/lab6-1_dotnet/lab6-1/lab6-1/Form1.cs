using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Diagnostics;
using System.Drawing;
using System.IO;
using System.Linq;
using System.Security;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace lab6_1
{
    public partial class Form1 : Form
    {
        private string hash;
        public static readonly string alphabet = "абвгґдеєжзиіїйклмнопрстуфхцчшщьюя";
        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            hash = "";
            RSA(true);
            label2.Text = "Хеш тексту: " + textBox1.Text.GetHashCode();
        }

        private void button2_Click(object sender, EventArgs e)
        {
            RSA(false);
            label2.Text = "Хеш тексту: " + textBox1.Text.GetHashCode();
        }

        private void RSA(bool encrypt)
        {
            StringBuilder text = new StringBuilder();
            StringBuilder output = new StringBuilder();
            int p = 3;
            int q = 11;
            int n = p * q;
            int e = 7;
            int d = 3;
            
            foreach (char c in textBox1.Text.ToCharArray())
            {
                int step;
                if (encrypt)
                {
                    if (alphabet.IndexOf(Convert.ToString(c).ToLower()) == -1) continue;
                    hash += Convert.ToString(c).ToLower();
                    step = (int) (Math.Pow(alphabet.IndexOf(Convert.ToString(c).ToLower()), e) % n);
                }
                else
                {
                    step = (int) (Math.Pow(alphabet.IndexOf(Convert.ToString(c).ToLower()), d) % n);
                }

                output.Append(alphabet.ToCharArray()[step]);
            }

            textBox1.Text = output.ToString();
        }

        private void loadToolStripMenuItem_Click(object sender, EventArgs e)
        {
            OpenFileDialog ofd = new OpenFileDialog();
            if (ofd.ShowDialog() == DialogResult.OK)
            {
                StreamReader sr = File.OpenText(ofd.FileName);
                textBox1.Text = sr.ReadToEnd();
                sr.Close();
            }
        }

        private void saveToolStripMenuItem_Click(object sender, EventArgs e)
        {
            OpenFileDialog ofd2 = new OpenFileDialog();
            StreamWriter sw = File.CreateText("D://");
            sw.Write(textBox1.Text);
            sw.Close();
        }
    }
}