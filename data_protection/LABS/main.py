import shutil
import os
from lab2 import *
from lab3 import *
from lab4 import *
from lab5 import *


def read_file(filename: str, ext: str) -> bytearray:
    with open(filename + '.' + ext, 'rb') as origin_file:
        return bytearray(origin_file.read())


def main():

    #lab1
    print("\n LAB 1 \n")

    print(is_prime(47))
    print(is_prime(48))
    print(get_prime(100, 5000))
    print(991 == pow_mod(3, 1000, 1001))
    diffie_hellman_algorithm()
    print(19 == giant_baby_step(30, 47, 23))

    #lab2
    print("\n LAB 2 \n")

    try:
        shutil.rmtree('outputs'), shutil.rmtree('encoded_files')
    except OSError:
        pass
    os.mkdir('outputs'), os.mkdir('encoded_files')

    filename = 'random_text'
    ext = 'txt'
    m = read_file(filename, ext)

    print('Encoding with Shamir...')
    sh_en = shamir_encode(m)
    print('Encoding with Elgamal...')
    elg_en = elgamal_encode(m)
    print('Encoding with Vernam...')
    vern_en = vernam_encode(m)
    print('Encoding with RSA...')
    rsa_en = rsa_encode(m)

    print('\nWriting keys to file...\n')
    with open('keys.json', 'w') as json_file:
        json.dump(keys, json_file, indent=4)
    print(f'Writing encoded data...\n')
    with open(r'encoded_files\shamir_encoded.txt', 'w') as encode_file:
        encode_file.write(str(sh_en))
    with open(r'encoded_files\elgamal_encoded.txt', 'w') as encode_file:
        encode_file.write(str(elg_en))
    with open(r'encoded_files\vernam_encoded.txt', 'w') as encode_file:
        encode_file.write(str(vern_en))
    with open(r'encoded_files\rsa_encoded.txt', 'w') as encode_file:
        encode_file.write(str(rsa_en))

    print('Decoding from Shamir...')
    sh_de = shamir_decode(sh_en)
    with open(r'outputs\\' + filename + '_sh' + '.' + ext, 'wb') as file:
        file.write(bytearray(sh_de))

    print('Decoding from Elgamal...')
    elg_de = elgamal_decode(elg_en)
    with open(r'outputs\\' + filename + '_elg' + '.' + ext, 'wb') as file:
        file.write(bytearray(elg_de))

    print('Decoding from Vernam...')
    vern_de = vernam_decode(vern_en)
    with open(r'outputs\\' + filename + '_vernam' + '.' + ext, 'wb') as file:
        file.write(bytearray(vern_de))

    print('Decoding from RSA...')
    rsa_de = rsa_decode(rsa_en)
    with open(r'outputs\\' + filename + '_rsa' + '.' + ext, 'wb') as file:
        file.write(bytearray(rsa_de))

    #lab3
    print("\n LAB3 \n")

    try:
        shutil.rmtree('signs')
    except OSError:
        pass
    os.mkdir('signs')

    filename = 'random_text'
    ext = 'txt'
    m = read_file(filename, ext)

    print('Encoding with Elgamal...')
    elg_en = elgamal_encode(m)

    #lab4
    print("\n LAB4 \n")
    lab4()

    #lab5
    print("\n LAB5 \n")
    lab5()


if __name__ == '__main__':
    main()