using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace lab9
{
    public partial class Form1 : Form
    {
        public static readonly string alphabet = "АБВГҐДЕЄЖЗИІЇЙКЛМНОПРСТУФХЦЧШЩЬЮЯ";
        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            crypto(true);
        }

        private void button2_Click(object sender, EventArgs e)
        {
            crypto(false);
        }

        private void loadToolStripMenuItem_Click(object sender, EventArgs e)
        {
            throw new System.NotImplementedException();
        }

        private void saveToolStripMenuItem_Click(object sender, EventArgs e)
        {
            throw new System.NotImplementedException();
        }

        private void crypto(bool encrypt)
        {
            StringBuilder text = new StringBuilder(textBox2.Text);
            StringBuilder output = new StringBuilder();
            int key = Convert.ToInt32(textBox1.Text);
            int step;
            if (encrypt)
            {
                foreach (char c in text.ToString().ToCharArray())
                {
                    if (alphabet.IndexOf(Convert.ToString(c).ToUpper()) == -1) continue;
                    step = (alphabet.IndexOf(Convert.ToString(c).ToUpper()) + key) % alphabet.Length;
                    if (Convert.ToString(step).Length < 2) output.Append("0" + step + ";");
                    else output.Append(step + ";");
                }
            }
            else
            {
                foreach (string s in text.ToString().Split(';'))
                {
                    if (s == "") continue;
                    step = Convert.ToInt32(s);
                    step = (step - key) % alphabet.Length;
                    if (step < 0) step = alphabet.Length + step;
                    output.Append(alphabet.ToCharArray()[step]);
                }
            }

            textBox2.Text = output.ToString();
        }
    }
}