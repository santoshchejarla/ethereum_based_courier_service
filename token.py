#! /home/chs/.venv-py3/bin/python3.7
import sys
from web3 import Web3

ganache_url = "http://127.0.0.1:7545"
web3 = Web3(Web3.HTTPProvider(ganache_url))
#print(sys.argv[1].__class__,sys.argv[2],sys.argv[3])
account_1 =  sys.argv[1]# Fill me in
#account_1 = '0xCa1ccf2bFbe4B6BB81C0944272acd9F47aFcc5a3'
account_2 = '0xAF3275F3634BeD9Bc0172A4F906141cB4240BFb4' # Fill me in
private_key = sys.argv[2] # Fill me in
#private_key = 'fd5357aeac0ce16f78bc5705d51083e8030a81301b26cd302225d005627a52c7'

nonce = web3.eth.getTransactionCount(account_1)

tx = {
    'nonce': nonce,
    'to': account_2,
    'value': web3.toWei(sys.argv[3], 'ether'),
    'gas': 2000000,
    'gasPrice': web3.toWei('50', 'gwei'),
}

signed_tx = web3.eth.account.signTransaction(tx, private_key)

tx_hash = web3.eth.sendRawTransaction(signed_tx.rawTransaction)

print(web3.toHex(tx_hash))
