from math import ceil
from sys import byteorder
from lab3 import *
from lab2 import *

voting_options = {"No": 0, "Yes": 1}


def inverse(n: int, p: int) -> int:
    inv = extended_euclidean_algorithm(n, p)[1]
    return inv


def my_sha(n: int) -> int:
    return int.from_bytes(hashlib.sha3_256(n.to_bytes(ceil(n.bit_length() / 8), byteorder=byteorder)).digest(),
                          byteorder=byteorder)


class Server:
    def __init__(self):
        print(f'Server 1 is started')
        while p := random.getrandbits(1024):
            if is_prime(p):
                break
        while q := random.getrandbits(1024):
            if is_prime(q):
                break
        assert p != q
        self.N = p * q
        phi = (p - 1) * (q - 1)
        self.d = get_coprime(phi)
        self.c = extended_euclidean_algorithm(self.d, phi)[1]
        while self.c < 0:
            self.c += phi
        self.voted = set()
        print(f'Server 1 has shut down')


def vote(name, choice, server) -> None:
    print(f'\n#{name} votes#')
    rnd = random.getrandbits(512)
    v = voting_options[choice]
    n = rnd << 512 | v
    r = get_coprime(server.N)
    h = my_sha(n)
    _h = h * pow_mod(r, server.d, server.N) % server.N
    if name in server.voted:
        return print(f'Vote from a voter {name} already have.')
    else:
        server.voted.add(name)
        _s = pow_mod(_h, server.c, server.N)
    s = _s * inverse(r, server.N) % server.N

    print(f'#Server response#')
    blanks = set()
    if my_sha(n) == pow_mod(s, server.d, server.N):
        print(f'The vote is accepted.')
        blanks.add((n, s))
    else:
        print(f'Vote reject')
        print(my_sha(n))
        print(pow_mod(s, server.d, server.N))


def lab5():
    server = Server()
    vote("Alice", "Yes", server)
    vote("Bob", "No", server)
    vote("Bob", "Yes", server)
    vote("Alice", "No", server)
