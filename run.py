from flask import Flask, render_template, jsonify, json, request, redirect, url_for, Response

app = Flask(__name__)

@app.route('/')
def index():
    return render_template('inicio.html')

@app.route('/login/')
def login():
    return render_template('login.html')

@app.route('/sign_in/')
def signin():
    return render_template('signin.html')


if __name__ == "__main__":
    app.run(debug = True, port=8080)
    