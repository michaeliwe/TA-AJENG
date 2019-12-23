import json
import codecs
import pandas as pd
from pandas.io.json import json_normalize
import demoji
from datetime import datetime
import re
import io

d = json.load(codecs.open('telkomuniversity/telkomuniversity.json', 'r', 'utf-8-sig'))

collections = []

for item in d['GraphImages']:
    data = {}
    comment = []
    caption = []
    data['id'] = item['id']
    idku = data['id']

    for c in item['comments']['data']:
        d={}
        d['tanggal'] = datetime.fromtimestamp(c['created_at']).date()
        d['waktu'] = datetime.fromtimestamp(c['created_at']).strftime("%H:%M")
        d['comment'] = demoji.replace(c['text'], 'emoji ')
        d['comment'] = d['comment'].replace('\n', ' ')
        d['user'] = c['owner']['username']
        d['id_posting'] = data['id']
        comment.append(d)

    for c in item['edge_media_to_caption']['edges']:
        a={}
        a['id_posting'] = str(idku)
        captions = demoji.replace(c['node']['text'], '')
        captions = re.sub('[!$;・・・• • • • •●●●●●●●●●●●●●●●●●●●●●●●●●●~,“”\t이틀남은‘’]', '', captions)
        captions = captions.replace('\r','')
        a['caption'] = captions.replace('\n','')
        caption.append(a)

    data['caption']= caption
    data['comments'] = comment
    data['total_comments'] = item['edge_media_to_comment']['count']
    data['likes'] = item['edge_media_preview_like']['count']
    collections.append(data)

data = json_normalize(collections)
data = pd.DataFrame(data)
data2 = data.drop(['comments'], axis=1)
data2 = data2.drop(['caption'], axis=1)
data2.to_csv('likes_comments_id_tetuka.csv')
caption = json_normalize(collections, 'caption')
pd.set_option('display.max_rows', caption.shape[0]+1)
caption.to_csv('caption_new.csv')
comments = json_normalize(collections, 'comments')

# file comments.csv
comments.to_csv('data_comment_id.csv')
