import json

import numpy
import processing as process
from flask import Flask, jsonify, redirect, request, url_for
from flask_cors import CORS
from flaskext.mysql import MySQL

app = Flask(__name__)
CORS(app)
# mysql = MySQL()
# app.config['MYSQL_DATABASE_USER'] = 'root'
# app.config['MYSQL_DATABASE_PASSWORD'] = ''
# app.config['MYSQL_DATABASE_DB'] = 'do_an'
# app.config['MYSQL_DATABASE_HOST'] = 'localhost'
# mysql.init_app(app)

@app.route('/classify', methods=['POST'])
def post_incomes():
    data = request.form['noidung']
    classify = process.classify(data)
    rate= classify[0].T.tolist()
    for i in range(0,10):
       rate[i][0]= numpy.around(rate[i][0]*100,decimals=3)
    kq = {
        'chinh_tri_xa_hoi':rate[0][0],
        'doi_song': rate[1][0] ,
        'khoa_hoc': rate[2][0] ,
        'kinh_doanh': rate[3][0] ,
        'phap_luat': rate[4][0] ,
        'suc_khoe': rate[5][0] ,
        'the_gioi': rate[6][0] ,
        'the_thao': rate[7][0] ,
        'van_hoa': rate[8][0] ,
        'vi_tinh': rate[9][0]
    }
    return jsonify(kq)

if __name__ == '__main__':
  app.run(debug = True)
