from flask import Flask, render_template, request, redirect, url_for, flash
import re

app = Flask(__name__)
app.secret_key = 'your_secret_key'

# Fake database to store emails
subscribed_emails = []

def is_valid_email(email):
    # Simple regex to validate email addresses
    return re.match(r"[^@]+@[^@]+\.[^@]+", email)

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/subscribe', methods=['POST'])
def subscribe():
    email = request.form['email']
    if not is_valid_email(email):
        flash('Veuillez fournir une adresse e-mail valide.', 'error')
        return redirect(url_for('index'))
    
    if email in subscribed_emails:
        flash('Cet e-mail est déjà inscrit.', 'info')
    else:
        subscribed_emails.append(email)
        flash(f'Inscription réussie à la newsletter pour {email}.', 'success')

    return redirect(url_for('index'))

if __name__ == '__main__':
    app.run(debug=True)
