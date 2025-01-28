from flask import Flask, jsonify, send_file
import random
from flask_cors import CORS # Para permitir peticiones desde cualquier origen
import csv
import os

labels = []

app= Flask(__name__)

CORS(app) # Para permitir peticiones desde cualquier origen

@app.route("/generate_labels/<int:n>", methods=['POST']) 
def generate_random_labels(n):
    labels.clear()
    for _ in range(n):
        label = {
            "name": f"Label_{random.randint(1, 1000)}",
            "country": random.choice(["USA", "UK", "Germany", "France", "Japan"]),
            "founded": random.randint(1950, 2020)
        }
        labels.append(label)
    print(labels)
    return {"labels": labels}


@app.route("/record_labels", methods=['GET'])
def record_labels():
    if not labels:
        return jsonify({"message": "No labels to record"}), 400

    
    file_path = os.path.join(os.path.dirname(__file__), "discografias.csv")
    with open(file_path, mode="w", newline="") as file:
        writer = csv.DictWriter(file, fieldnames=["name", "country", "founded"])
        writer.writeheader()
        writer.writerows(labels)
    return jsonify({"message": "Labels recorded successfully"})

if __name__ == '__main__':
    app.run(debug=True)
    

