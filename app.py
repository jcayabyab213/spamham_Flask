from flask import Flask, render_template, flash, jsonify, request
from sklearn.feature_extraction.text import CountVectorizer, TfidfTransformer
import pickle



app = Flask(__name__)
model = pickle.load(open("model.pkl", "rb"))
vectorizer = pickle.load(open("vectorizer.pkl", "rb"))
app.secret_key= "wakwakwak"
count_vectorizer = CountVectorizer()

@app.route("/home")

def index():
	flash("")
	return render_template("index.php")



@app.route("/classify", methods=["POST"])
def greet():
	testing = str(request.form['name_input'])
	testing = [testing]
	
	testing_counts = vectorizer.transform(testing)
	predictions = model.predict(testing_counts)
	flash(str(request.form['name_input']), "flash2")
	x = len(str(request.form['name_input']))
	
	if (x==0):
		flash("Please input something", "flash1")
	else:
		if (predictions == 1):
				flash("This email is a spam.", "flash1")
		else:
    			flash("This email is legit (ham)", "flash1")
	return render_template("index.php")

@app.route("/contact")
def contact():
	return render_template("contact.html")

